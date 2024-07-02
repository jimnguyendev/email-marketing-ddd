<?php

namespace Database\Factories\Subscriber;

use App\Models\Form;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    protected $model = Form::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(2, true),
            'content' => $this->faker->randomHtml(),
            'user_id' => User::factory(),
        ];
    }
}
