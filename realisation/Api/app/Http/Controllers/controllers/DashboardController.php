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
    public function years(){
        $years = Formation_year::all();
        return $years;
    }

    public function formation(Request $request, $id){
        $year = Formation_year::findOrFail($id);
        $group = Group::where('formation_id', $year->id)->first();
        $studentCount = $group->students;
        $kk = $studentCount->id;
        return [
            // 'year' => $year,
            // 'group' => $group,
            // 'studentCount' => $studentCount,
            'kk' => $kk
        ];
    }

    // public function studentAv(){
    //     $students = Student::all();
    //     $briefs = Preparation_brief::all();
    //     // $arr = [];
    //     $totalcalTask = [];
    //     $totalStdentBrief = '';
    //     $arr1 = [];
    //     foreach($students as $student){
    //        foreach($briefs as $brief){
    //             $totalStudent =  Task::where('preparation_brief_id', $brief->id)
    //             ->distinct()->get(['student_id'])->count();
    //             $task_notYet = Task::where('student_id', $student->id)
    //                             ->where('preparation_brief_id', $brief->id)
    //                             ->where('state', 'onPause')
    //                             ->get()->count();
    //             $totalTasks = Task::where('student_id', $student->id)
    //                             ->where('preparation_brief_id', $brief->id)
    //                             ->get()->count();
    //             if($totalTasks != 0){
    //             $brief_id = $brief->id;
    //             $brief_name = $brief->name;
    //             $student_id = $student->id;
    //             $name = $student->name;
    //             $studentAv = (($totalTasks-$task_notYet)/($totalTasks))*100;
    //             array_push($totalcalTask, $studentAv);
    //             $totalStdentBrief = $totalStudent;
    //             $arr[] = [
    //                 'student_name' =>$name,
    //                 'av' => $studentAv,
    //                 'brief' => $brief_id,
    //                 'student_id' => $student_id,
    //             ];
    //         }
    //        }
    //     }
    //     foreach($briefs as $brief){
    //         $brief_av = array_sum($totalcalTask)/$totalStdentBrief;
    //         $b = Task::where('preparation_brief_id', $brief->id)
    //                             ->get();
    //         $brief_name = $brief_name;
    //         $brief = $brief_id;
    //         $arr1[] = [
    //             'brief_av' => $brief_av,
    //             'brief_name' => $brief_name,
    //             'brief' => $brief_id
    //         ];
    //     }
    //     dd($b);
       
        
    //     return response()->json(['arr' => $arr, 
    //                             'arr1' => $arr1]);
    // }
}
