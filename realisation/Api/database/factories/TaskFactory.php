<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Student_brief;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_date = Carbon::instance($this->faker->dateTimeBetween('-1 months','+1 months'));
        $end_date = (clone $start_date)->addDays(random_int(0,14));
        $student_brief_id = Student_brief::all()->pluck('id')->toArray();
        $student_id = Student::all()->pluck('id')->toArray();
        return [
            //
            'start_date' => $start_date,
            'end_date'   => $end_date,
            'student_id' => fake()->randomElement($student_id),
            'student_brief_id' => fake()->randomElement($student_brief_id)
        ];
    }
}
