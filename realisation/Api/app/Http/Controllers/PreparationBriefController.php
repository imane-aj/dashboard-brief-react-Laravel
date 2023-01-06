<?php

namespace App\Http\Controllers;

use App\Imports\BriefImport;
use App\Models\Formateur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PreparationBrief;
use Maatwebsite\Excel\Facades\Excel;

class PreparationBriefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $briefs = PreparationBrief::all();
        $briefs_page =PreparationBrief::paginate(4);
        return view('preparationBrief.index',['briefs'=>$briefs,'briefs_page'=>$briefs_page]);
    }


    // public function filter_bief(Request $request){
    //     $task=PreparationBrief::where('id','Like','%'.$request->filter.'%')->get();
    //     // $task =PreparationTache::paginate(3);
    //     return response(['dataTask'=>$task]);
    // }

    public function search_brief(Request $request){
        $searchbrief=PreparationBrief::where('Nom_du_brief','Like','%'.$request->searchbrief.'%')->get();
        return response(['search'=>$searchbrief]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formateurs=Formateur::all();
        return view('preparationBrief.create',['formateurs'=>$formateurs]);
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
            'Nom_du_brief'=>'required|max:50',
            'Duree'=>'required'
        ]);
        PreparationBrief::create([

            'Nom_du_brief'=>$request->Nom_du_brief,
            'Description'=>$request->Description,
            'Duree'=>$request->Duree,
            'Formateur_id '=>$request->Formateur_id 
        ]);

        return to_route('brief.index');
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
        $edit = PreparationBrief::findOrFail($id);
        $formateurs = Formateur::all();
        return view('preparationBrief.edit',['edit'=>$edit,'formateurs'=>$formateurs]);
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
                'Nom_du_brief'=>'required|max:50',
                'Duree'=>'required'
            ]);
            $update=PreparationBrief::findOrFail($id);
            $update->Nom_du_brief=$request->get('Nom_du_brief');
            $update->Description=$request->get('Description');
            $update->Duree=$request->get('Duree');
            $update->Formateur_id=$request->get('Formateur_id');
            $update->save();


            return redirect('/brief')->with('success');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PreparationBrief::findOrFail($id);
        $delete->delete();
        return back();
    }

     // export data format excel

     public function exportexcel(){
        return Excel::download(new BriefImport,'datapage.xlsx');
    }

    //  import data format excel
     public function importexcel(Request $request){

        Excel::import(new BriefImport, $request->file);
        return redirect()->back();

    }

    //  Export data form PDF

    public function generatepdf(){

        $preparationBrief = PreparationBrief::all();
        $pdf = Pdf::loadView('pdf.preparationBrief', compact('preparationBrief'));
            return $pdf->download('preparationBrief.pdf');
        }
}