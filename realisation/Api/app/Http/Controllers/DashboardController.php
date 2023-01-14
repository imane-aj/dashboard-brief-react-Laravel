<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Tache;
use App\Models\Groupes;
use App\Models\Apprenant;
use Illuminate\Http\Request;
use App\Models\AnneFormation;
use App\Models\PreparationBrief;

class DashboardController extends Controller
{
    //
    public function years()
    {
        $years = AnneFormation::all();
        return $years;
    }

    public function formation(Request $request, $id)
    {
        $year = AnneFormation::findOrFail($id);
        $group = Groupes::where('Annee_formation_id', $year->id)->first();
        $studentCount = $group->students->count();
        $students = $group->students()->get();

        //brief av
        $info = $students->map(function ($student) use (&$total_task_briefs, &$total_taskDone_briefs){
            $brief  = Brief::where('Apprenant_id',$student->id)->get();
            $brief_aff = PreparationBrief::where('id', $brief[0]->Preparation_brief_id)->get();
            $total_task_brief = Tache::where('preparation_brief_id', $brief_aff[0]->id)->count();
            $total_taskDone_brief = Tache::where('preparation_brief_id', $brief_aff[0]->id )->where('Etat', 'terminer')->count();

            $total_task_briefs[] = (object) ['total_task_brief' => $total_task_brief];             // for the grp av
            $total_taskDone_briefs[] = (object) ['total_taskDone_brief' => $total_taskDone_brief]; // for the grp av

            if($total_task_brief != 0){
                $brief_av = (100 / $total_task_brief)*$total_taskDone_brief;
            }else{
                $brief_av = 1;
            }
            return ['brief_aff' => $brief_aff,'brief_av'=>$brief_av];
        })->unique();

        //group av
        $total_task_briefs_arr = collect($total_task_briefs)->unique();
        $all_tasks =$total_task_briefs_arr->sum('total_task_brief');

        $total_taskDone_briefs_arr = collect($total_taskDone_briefs)->unique();
        $Tasks_done =$total_taskDone_briefs_arr->sum('total_taskDone_brief');

        if($all_tasks != 0){
            $group_av = (100/$all_tasks)*$Tasks_done;
        }else{
            $group_av = 1;
        }
        return [
            'year' => $year,
            'group' => $group,
            'studentCount' => $studentCount,
            'brief_info' => $info,
            'group_av' => $group_av
        ];
    }

    public function studentAv(){
        $students = Apprenant::all();
        $briefs = PreparationBrief::all();
        foreach($students as $student){
           foreach($briefs as $brief){
                $task_done = Tache::where('Apprenant_id', $student->id)
                                    ->where('preparation_brief_id', $brief->id)
                                    ->where('Etat', 'terminer')
                                    ->get()->count();
                $totalTasks = Tache::where('Apprenant_id', $student->id)
                                    ->where('preparation_brief_id', $brief->id)
                                    ->get()->count();
                if($totalTasks != 0){
                $brief_id = $brief->id;
                $brief_name = $brief->Nom_du_brief;
                $student_id = $student->id;
                $name = $student->Nom;
                $studentAv = ((100/$totalTasks)*($task_done));
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
//     public function lastYear()
//     {
//         $year = Formation_year::all()->last();
//         $group = Group::where('formation_id', $year->id)->first();
//         $studentCount = $group->students->count();

//         $brief_aff = $group->students->map(function ($student) {
//             return $student->student_preparation_brief;
//         })->unique('id');

//         $brief_info = [];
//         $students = $group->students()->get();

//         $total_tasks_briefs = [];
//         $total_tasksDone_briefs = [];
//         foreach($students as $student){
//             $b_aff = Student_brief::where('student_id', $student->id)->get();
//             foreach($b_aff as $brief){

//                 $total_task_brief =  Task::where('preparation_brief_id', $brief->preparation_brief_id)
//                                                 ->get()->count();
//                 $total_taskDone_brief = Task::where('preparation_brief_id', $brief->preparation_brief_id)
//                                                 ->where('state', 'done')
//                                               ->get()->count();
//                 if($total_task_brief != 0){
//                     $brief_av = (100 / $total_task_brief)*$total_taskDone_brief;
//                     $brief_name = Preparation_brief::where('id', $brief->preparation_brief_id)->first()->name;
//                     $arr1 = [
//                         'brief_av' => $brief_av,
//                         'brief_name' => $brief_name
//                     ];
//                     array_push($brief_info, $arr1);
//                 }
//                 array_push($total_tasks_briefs, $total_task_brief);
//                 array_push($total_tasksDone_briefs, $total_taskDone_brief);
//             }

//         }
//         array_pop($total_tasks_briefs);
//         array_pop($total_tasksDone_briefs);
//         $total_tasks_briefs_count = array_sum($total_tasks_briefs);
//         $total_tasksDone_briefs_count = array_sum($total_tasksDone_briefs);
//         $group_av = (100/$total_tasks_briefs_count)*$total_tasksDone_briefs_count;
//         return [
//             'year' => $year,
//             'group' => $group,
//             'studentCount' => $studentCount,
//             'brief_aff' => $brief_aff,
//             'briefs' => $brief_info,
//             'group_av' => $group_av
//         ];
// }

public function index(){
    return view('adminDashboard');
}
}
