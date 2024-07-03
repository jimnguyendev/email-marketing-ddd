<?php

namespace Database\Factories\Mail;

use App\Models\Sequence;
use App\Models\SequenceMail;
use App\Models\User;
use Modules\Shared\Enums\SequenceMailStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

class SequenceMailFactory extends Factory
{
    protected $model = SequenceMail::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $statuses = SequenceMailStatus::cases();

        return [
            'sequence_id' => Sequence::factory(),
            'subject' => $this->faker->words(3, true),
            'content' => $this->faker->randomHtml(),
            'status' => $statuses[random_int(0, count($statuses) - 1)],
            'user_id' => User::factory(),
        ];
    }

    public function published(): SequenceMailFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => SequenceMailStatus::Published,
            ];
        });
    }
}
