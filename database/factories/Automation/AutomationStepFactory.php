<?php

namespace Database\Factories\Automation;

use App\Models\Automation;
use App\Models\AutomationStep;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutomationStepFactory extends Factory
{
    protected $model = AutomationStep::class;

    public function definition(): array
    {
        $types = [
            'event',
            'action',
        ];
        $names = [
            'addToSequence',
            'addTag',
        ];

        return [
            'type' => collect($types)->random(),
            'name' => collect($names)->random(),
            'automation_id' => Automation::factory(),
            'value' => [],
        ];
    }
}
