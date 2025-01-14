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
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $now = Carbon::now();

        $messages = User::where('email','usamashah0110@gmail.com')->get();

        foreach ($messages as $message) {
            $created_at = Carbon::parse($message->created_at);
            $frequency = strtolower($message->frequency);

            // Check if it's time to send a message
            if (($frequency === 'daily' && $created_at->diffInDays($now) >= 1) ||
                ($frequency === 'weekly' && $created_at->diffInWeeks($now) >= 1) ||
                ($frequency === 'monthly' && $created_at->diffInMonths($now) >= 1)
            ) {
                // Send message via Twilio
                $twilio->messages->create(
                    '+923224407380',
                    [
                        'from' => env('TWILIO_PHONE_NUMBER'),
                        'body' => "Your scheduled message content here."
                    ]
                );

                // Update created_at to prevent duplicate messages
                $message->update(['created_at' => $now]);
            }
        }

        $this->info('Scheduled messages sent successfully!');
    }
}

