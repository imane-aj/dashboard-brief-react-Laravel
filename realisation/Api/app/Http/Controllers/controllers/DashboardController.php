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
    public function years()
    {
        $years = Formation_year::all();
        return $years;
    }

    public function formation(Request $request, $id)
    {
        $year = Formation_year::findOrFail($id);
        $group = Group::where('formation_id', $year->id)->first();
        $studentCount = $group->students->count();

        $brief_aff = $group->students->map(function ($student) {
            return $student->student_preparation_brief;
        })->unique('id');   

        $brief_info = [];
        $students = $group->students()->get();

        $total_tasks_briefs = [];
        $total_tasksDone_briefs = [];
        foreach($students as $student){
            $b_aff = Student_brief::where('student_id', $student->id)->get();
            foreach($b_aff as $brief){
                
                $total_task_brief =  Task::where('preparation_brief_id', $brief->preparation_brief_id)
                                                ->get()->count();  
                $total_taskDone_brief = Task::where('preparation_brief_id', $brief->preparation_brief_id)
                                                ->where('state', 'done')
                                              ->get()->count();
                if($total_task_brief != 0){
                    $brief_av = (100 / $total_task_brief)*$total_taskDone_brief;
                    $brief_name = Preparation_brief::where('id', $brief->preparation_brief_id)->first()->name;
                    $arr1 = [
                        'brief_av' => $brief_av,
                        'brief_name' => $brief_name
                    ];
                    array_push($brief_info, $arr1);
                }
                array_push($total_tasks_briefs, $total_task_brief);
                array_push($total_tasksDone_briefs, $total_taskDone_brief);
            }
            
        }
        array_pop($total_tasks_briefs);
        array_pop($total_tasksDone_briefs);
        $total_tasks_briefs_count = array_sum($total_tasks_briefs);
        $total_tasksDone_briefs_count = array_sum($total_tasksDone_briefs);
        $group_av = (100/$total_tasks_briefs_count)*$total_tasksDone_briefs_count;
        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'brief_aff' => $brief_aff,
            'briefs' => $brief_info,
            'group_av' => $group_av
        ];
    }

    public function studentAv(){
        $students = Student::all();
        $briefs = Preparation_brief::all();
        foreach($students as $student){
           foreach($briefs as $brief){
                $task_notYet = Task::where('student_id', $student->id)
                                    ->where('preparation_brief_id', $brief->id)
                                    ->where('state', 'onPause')
                                    ->get()->count();
                $totalTasks = Task::where('student_id', $student->id)
                                    ->where('preparation_brief_id', $brief->id)
                                    ->get()->count();
                if($totalTasks != 0){
                $brief_id = $brief->id;
                $brief_name = $brief->name;
                $student_id = $student->id;
                $name = $student->name;
                $studentAv = (($totalTasks-$task_notYet)/($totalTasks))*100;
                $arr[] = [
                    'student_name' =>$name,
                    'av' => $studentAv,
                    'brief' => $brief_id,
                    'student_id' => $student_id,
                    'brief_name' => $brief_name
                    
                ];
            }
           }
        }
        return response()->json([
            'arr'   => $arr,
        ]);
       
    }


    //get the last year
    public function lastYear()
    {
        $year = Formation_year::all()->last();
        $group = Group::where('formation_id', $year->id)->first();
        $studentCount = $group->students->count();

        $brief_aff = $group->students->map(function ($student) {
            return $student->student_preparation_brief;
        })->unique('id');   

        $brief_info = [];
        $students = $group->students()->get();

        $total_tasks_briefs = [];
        $total_tasksDone_briefs = [];
        foreach($students as $student){
            $b_aff = Student_brief::where('student_id', $student->id)->get();
            foreach($b_aff as $brief){
                
                $total_task_brief =  Task::where('preparation_brief_id', $brief->preparation_brief_id)
                                                ->get()->count();  
                $total_taskDone_brief = Task::where('preparation_brief_id', $brief->preparation_brief_id)
                                                ->where('state', 'done')
                                              ->get()->count();
                if($total_task_brief != 0){
                    $brief_av = (100 / $total_task_brief)*$total_taskDone_brief;
                    $brief_name = Preparation_brief::where('id', $brief->preparation_brief_id)->first()->name;
                    $arr1 = [
                        'brief_av' => $brief_av,
                        'brief_name' => $brief_name
                    ];
                    array_push($brief_info, $arr1);
                }
                array_push($total_tasks_briefs, $total_task_brief);
                array_push($total_tasksDone_briefs, $total_taskDone_brief);
            }
            
        }
        array_pop($total_tasks_briefs);
        array_pop($total_tasksDone_briefs);
        $total_tasks_briefs_count = array_sum($total_tasks_briefs);
        $total_tasksDone_briefs_count = array_sum($total_tasksDone_briefs);
        $group_av = (100/$total_tasks_briefs_count)*$total_tasksDone_briefs_count;
        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'brief_aff' => $brief_aff,
            'briefs' => $brief_info,
            'group_av' => $group_av
        ];
    }
}
