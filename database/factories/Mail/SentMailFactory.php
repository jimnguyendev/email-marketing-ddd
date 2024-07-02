<?php

namespace Database\Factories\Mail;

use App\Models\Broadcast;
use App\Models\SentMail;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Factories\Factory;

class SentMailFactory extends Factory
{
    protected $model = SentMail::class;

    public function definition(): array
    {
        return [
            'sendable_id' => Broadcast::factory(),
            'sendable_type' => Broadcast::class,
            'subscriber_id' => Subscriber::factory(),
            'sent_at' => now(),
        ];
    }
}
