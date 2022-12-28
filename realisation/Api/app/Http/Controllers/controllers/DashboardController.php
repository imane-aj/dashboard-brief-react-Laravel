<?php

namespace App\Http\Controllers\controllers;

use App\Models\Task;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use App\Models\Formation_year;
use App\Http\Controllers\Controller;
use App\Models\Group_preparation_brief;
use App\Models\Preparation_brief;
use App\Models\Student_brief;

class DashboardController extends Controller
{
    //

    public function formation(){
        $years = Formation_year::all();
        $groups = Group::all();
        $group_student = StudentGroup::all();
        $student_briefs = Student_brief::all();
        $preparation_briefs = Preparation_brief::all();
        return [
            'groups' =>$groups,
            'years' =>  $years,
            'students' => $group_student,
            'briefs' => $student_briefs,
            'preparation_briefs' => $preparation_briefs
        ];
    }

    public function studentAv(){
        $students = Student::all();
        $briefs = Preparation_brief::all();
        $arr = [];
        $totalcalTask = [];
        foreach($students as $student){
           foreach($briefs as $brief){
                // $student_brief_total = Task::where('student_id', $student->id)
                //                     ->where('preparation_brief_id', $brief->id)->get()->count();
                // dd($student_brief_total);
                $task_notYet = Task::where('student_id', $student->id)
                                ->where('preparation_brief_id', $brief->id)
                                ->where('state', 'onPause')
                                ->get()->count();
                $totalTasks = Task::where('student_id', $student->id)
                                ->where('preparation_brief_id', $brief->id)
                                ->get()->count();
                if($totalTasks != 0){
                $brief = $brief->id;
                $student_id = $student->id;
                $name = $student->name;
                $studentAv = (($totalTasks-$task_notYet)/($totalTasks))*100;
                // array_sum($totalcalTask);
                array_push($totalcalTask, $studentAv);
                $arr[] = [
                    'student_name' =>$name,
                    'av' => $studentAv,
                    'brief' => $brief,
                    'student_id' => $student_id,
                ];
            }
           }
        }

        array_sum($totalcalTask);
        return response()->json($arr);
    }
}
