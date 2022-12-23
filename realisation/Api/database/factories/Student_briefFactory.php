<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Student_briefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $studentId = Student::all()->pluck('id')->toArray();
        $groupId = Group::all()->pluck('id')->toArray();
        return [
            //
            'student_id' => fake()->randomElement($studentId),
            'group_id'   => fake()->randomElement($groupId),
            'affectation_date' => fake()->date()
        ];
    }
}
