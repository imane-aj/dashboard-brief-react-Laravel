<?php

namespace Database\Factories;

use App\Models\Preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Preparation_taskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $preparation_brief_id = Preparation_brief::all()->pluck('id')->toArray();
        return [
            //
            'name'  => fake()->name(),
            'desc'  => fake()->text(),
            'Duree' => $this->faker->dayOfMonth().'S',
            'preparation_brief_id' => fake()->randomElement($preparation_brief_id) 
        ];
    }
}
