<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Teacher::factory(4)->create();
        \App\Models\Student::factory(4)->create();
        \App\Models\Formation_year::factory(4)->create();
        \App\Models\Group::factory(4)->create();
        \App\Models\Preparation_brief::factory(4)->create();
        \App\Models\Preparation_task::factory(4)->create();
        \App\Models\Student_brief::factory(4)->create();
        \App\Models\StudentGroup::factory(4)->create();
        \App\Models\Task::factory(4)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
