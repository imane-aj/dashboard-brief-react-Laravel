<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'     => fake()->name(),
            'lastName' => fake()->lastName(),
            'email'    => fake()->unique()->safeEmail(),
            "adress"   => $this->faker->address(),
            "cin"      => $this->faker->regexify('[A-Z]{2}[0-4]{6}'),
            'picture'  => $this->faker->imageUrl(640,480),
            'phone'    => fake()->phoneNumber()
        ];
    }
}
