<?php

namespace Database\Factories;

use App\Models\Formation_year;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teacherId   = Teacher::all()->pluck('id')->toArray();
        $formationId = Formation_year::all()->pluck('id')->toArray();
        return [
            //
            'name' => fake()->name(),
            'logo' => $this->faker->imageUrl(640,480),
            'teacher_id' => fake()->randomElement($teacherId),
            'formation_id' => fake()->randomElement($formationId)
        ];
    }
}
