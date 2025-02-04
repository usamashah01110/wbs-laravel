<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription as SubscriptionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Plan;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Subscription;

class PaymentController extends Controller
{
    public function index(){

        return view('checkout');

    }

    public function paymentPage(Request $request){

        $request = $request->all();

        return view('payment-checkout', ['request' => $request]);

    }

    public function createPaymentIntent(Request $request)
    {
        $validatedData = $request->validate([
            'totalAmount' => 'required|numeric|min:0.50',
            'billingCycle' => 'required|in:one_time,monthly,yearly'
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            if ($validatedData['billingCycle'] === 'one_time') {
                // Create one-time payment intent
                $paymentIntent = PaymentIntent::create([
                    'amount' => $validatedData['totalAmount'] * 100,
                    'currency' => 'gbp',
                    'automatic_payment_methods' => ['enabled' => true],
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                    'type' => 'payment_intent'
                ]);
            } else {
                // Create customer if doesn't exist
                $user = auth()->user();
                $customerData = [
                    'email' => $user->email,
                    'name' => $user->name,
                ];

                if (!$user->stripe_id) {
                    $customer = Customer::create($customerData);
                    $user->stripe_id = $customer->id;
                    $user->save();
                }

                // Create a temporary product for this subscription
                $product = Product::create([
                    'name' => 'Monthly Subscription'
                ]);

                $interval = ($validatedData['billingCycle'] === 'monthly') ? 'month' : 'year';

                $price = Price::create([
                    'product' => $product->id,
                    'unit_amount' => $validatedData['totalAmount'] * 100,
                    'currency' => 'gbp',
                    'recurring' => [
                        'interval' => $interval, // dynamically set the interval
                    ]
                ]);

                // Create subscription with the price
                $subscription = Subscription::create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $price->id]],
                    'payment_behavior' => 'default_incomplete',
                    'expand' => ['latest_invoice.payment_intent'],
                ]);

                return response()->json([
                    'clientSecret' => $subscription->latest_invoice->payment_intent->client_secret,
                    'type' => 'subscription',
                    'subscriptionId' => $subscription->id
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function handlePaymentSuccess(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $user = auth()->user();

            // Retrieve payment intent to get amount and status
            $paymentIntent = PaymentIntent::retrieve($request['payment_intent']);

            if ($request['payment_type'] === 'one_time') {
                // Store one-time payment in transactions table
                DB::table('transactions')->insert([
                    'user_id' => $user->id,
                    'type' => 'one_time',
                    'amount' => $paymentIntent->amount / 100,
                    'stripe_id' => $paymentIntent->id,
                    'stripe_status' => $paymentIntent->status,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                // Update user payment method if needed
                if ($paymentIntent->payment_method) {
                    $paymentMethod = \Stripe\PaymentMethod::retrieve($paymentIntent->payment_method);
                    $user->update([
                        'pm_type' => $paymentMethod->type,
                    ]);
                }
            } else {
                // Subscription payment handling (previous code)
                $stripeSubscription = Subscription::retrieve($request['subscription_id']);
                $stripePriceId = $stripeSubscription->items->data[0]->price->id;
                $subscriptions = explode(',', $request['subscriptions']);
                $fullWill = (isset($subscriptions[0]) && $subscriptions[0] == 'fullWill') ? true : false;
                $poa = (isset($subscriptions[3]) && $subscriptions[3] == 'poa') ? true : false;
                $executor = (isset($subscriptions[6]) && $subscriptions[6] == 'executor') ? true : false;

                    DB::table('subscriptions')->updateOrInsert(
                        ['user_id' => $user->id], // Condition to check existing record
                        [
                            'type' => 'monthly',
                            'stripe_id' => $stripeSubscription->id,
                            'stripe_status' => $stripeSubscription->status,
                            'stripe_price' => $stripePriceId,
                            'quantity' => 1,
                            'total_amount' => $request['totalAmount'],
                            'poa' => $poa,
                            'fullWill' => $fullWill,
                            'executor' => $executor,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]
                    );

                if ($stripeSubscription->default_payment_method) {
                    $paymentMethod = $stripeSubscription->default_payment_method;
                    $user->update([
                        'pm_type' => $paymentMethod->type,
                        'pm_last_four' => $paymentMethod->card->last4
                    ]);
                }

                session()->forget(['temp_subscription_id', 'temp_price_id']);
            }
            $totalAmount = $request['totalAmount'];
            return view('success-page',compact('totalAmount',));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
