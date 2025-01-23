<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Twilio\Rest\Client;
use Carbon\Carbon;

class SendScheduledMessages extends Command
{
    protected $signature = 'send:scheduled-messages';
    protected $description = 'Send messages based on frequency';

    public function handle()
    {
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');
        $now = Carbon::now();

        $messages = User::where('email', 'usamashah0110@gmail.com')->get();

        foreach ($messages as $message) {
            $created_at = Carbon::parse($message->created_at);
            $frequency = strtolower($message->frequency);

            if (($frequency === 'daily' && $created_at->diffInDays($now) >= 1) ||
                ($frequency === 'weekly' && $created_at->diffInWeeks($now) >= 1) ||
                ($frequency === 'monthly' && $created_at->diffInMonths($now) >= 1)
            ) {
                // Prepare curl request
                $toPhoneNumber = '+18153416531'; // Replace with the recipient's phone number
                $messageBody = "Your scheduled message content here.";

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.twilio.com/2010-04-01/Accounts/{$twilioSid}/Messages.json",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => http_build_query([
                        'To' => $toPhoneNumber,
                        'From' => $twilioPhoneNumber,
                        'Body' => $messageBody,
                    ]),
                    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                    CURLOPT_USERPWD => "{$twilioSid}:{$twilioAuthToken}",
                ]);

                $response = curl_exec($curl);
                $error = curl_error($curl);
                curl_close($curl);

                if ($error) {
                    $this->error("Curl Error: {$error}");
                } else {
                    $this->info("Message sent successfully: {$response}");

                    // Update created_at to prevent duplicate messages
                    $message->update(['created_at' => $now]);
                }
            }
        }

        $this->info('Scheduled messages processed successfully!');
    }

}

