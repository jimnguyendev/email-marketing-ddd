<?php

namespace Database\Factories\Subscriber;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'user_id' => User::factory(),
        ];
    }
}
