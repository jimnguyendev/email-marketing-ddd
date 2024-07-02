<?php

namespace Database\Factories\Mail;

use App\Models\SequenceMail;
use App\Models\SequenceMailSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

class SequenceMailScheduleFactory extends Factory
{
    protected $model = SequenceMailSchedule::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'sequence_mail_id' => SequenceMail::factory(),
            'delay' => random_int(1, 5),
            'unit' => 'day',
            'allowed_days' => [
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true,
                'sunday' => true,
            ],
        ];
    }
}
