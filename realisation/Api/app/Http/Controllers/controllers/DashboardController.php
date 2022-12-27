<?php

namespace App\Http\Controllers\controllers;

use App\Models\Task;
use App\Models\Group;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Models\Formation_year;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function formation(){
        $years = Formation_year::all();
        $groups = Group::all();
        $group_student = StudentGroup::all();
        return [
            'groups' =>$groups,
            'years' =>  $years,
            'students' => $group_student
        ];
    }

    public function student(){
        $task_done = Task::where('state', 'done')->get()->count();
        $task_notYet = Task::where('state', 'onPause')->get()->count();
        $totalTasks = Task::all()->count();

        $studentAv = ($task_done-$task_notYet)/($totalTasks*100);
        return $studentAv;
    }
}
