<?php

namespace Database\Factories\Mail;

use App\Models\Broadcast;
use App\Models\User;
use Modules\Shared\Enums\BroadcastStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class BroadcastFactory extends Factory
{
    protected $model = Broadcast::class;

    public function definition(): array
    {
        return [
            'subject' => $this->faker->words(2, true),
            'content' => $this->faker->randomHtml(),
            'filters' => [],
            'status' => BroadcastStatus::Draft,
            'user_id' => User::factory(),
        ];
    }
}
