<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Preparation_briefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teacherId = Teacher::all()->pluck('id')->toArray();
        return [
            //
            'name' => fake()->name(),
            'desc' => fake()->text(),
            'Duree' => $this->faker->dayOfMonth().'S',
            'teacher_id' => fake()->randomElement($teacherId)
        ];
    }
}
