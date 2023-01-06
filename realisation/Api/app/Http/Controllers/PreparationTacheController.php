<?php

namespace App\Http\Controllers;

use App\Models\PreparationBrief;
use App\Models\PreparationTache;
use Illuminate\Http\Request;
use App\Exports\TaskExport;
use App\Imports\TaskImport;
use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class PreparationTacheController extends Controller
{

    function __construct()
    {
        $this->middleware("can:isFormateur")->only(["destroy"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brief=PreparationBrief::all();
        $count =PreparationTache::count();

        $tasks =PreparationTache::paginate(3);

        // $pagination = PreparationTache::paginate($tasks);

        // $tasks =PreparationTache::count();
        // dd($count);
        return view('tasks.index',['brief'=>$brief,'tasks'=>$tasks]);
    }


    public function filter_bief(Request $request){
        $task=PreparationTache::where('Preparation_brief_id','Like','%'.$request->filter.'%')->get();
        // $task =PreparationTache::paginate(3);
        return response(['dataTask'=>$task]);
    }

    public function search_tache(Request $request){
        $searchtask=PreparationTache::where('Nom_tache','Like','%'.$request->searchtask.'%')->get();
        return response(['search'=>$searchtask]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brief=PreparationBrief::all();
        return view('tasks.create',['brief'=>$brief]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nom_tache'=>'required|max:50',
            'Duree'=>'required'
        ]);
        PreparationTache::create([

            'Nom_tache'=>$request->Nom_tache,
            'Description'=>$request->Description,
            'Duree'=>$request->Duree,
            'Preparation_brief_id'=>$request->Preparation_brief_id
        ]);

        return to_route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=PreparationTache::findOrFail($id);
        $brief=PreparationBrief::all();
        return view('tasks.edit',['edit'=>$edit,'brief'=>$brief]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom_tache'=>'required|max:50',
            'Duree'=>'required'
        ]);
        $update=PreparationTache::findOrFail($id);
        $update->Nom_tache=$request->get('Nom_tache');
        $update->Description=$request->get('Description');
        $update->Duree=$request->get('Duree');
        $update->Preparation_brief_id=$request->get('Preparation_brief_id');
        $update->save();


        return redirect('/task')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PreparationTache::findOrFail($id);
        $delete->delete();
        return redirect('/task');
    }

     // export data format excel

     public function exportexcel(){
        return Excel::download(new TaskExport,'datapage.xlsx');
    }

     // import data format excel
     public function importexcel(Request $request){

        Excel::import(new TaskImport, $request->file);
        return redirect()->back();

    }

    //  Export data form PDF

    public function generatepdf(){

        $tasks = PreparationTache::all();
        $pdf = Pdf::loadView('pdf.tasks', compact('tasks'));
    return $pdf->download('tasks.pdf');
    }

}
