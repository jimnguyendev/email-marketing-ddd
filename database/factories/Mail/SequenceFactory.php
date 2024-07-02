<?php

namespace Database\Factories\Mail;

use App\Models\Sequence;
use App\Models\User;
use Domain\Shared\Enums\SequenceStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

class SequenceFactory extends Factory
{
    protected $model = Sequence::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $statuses = SequenceStatus::cases();
        return [
            'title' => $this->faker->words(4, true),
            'status' => $statuses[random_int(0, count($statuses) - 1)]->value,
            'user_id' => User::factory(),
        ];
    }
}
