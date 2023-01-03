<?php

namespace App\Http\Controllers;

use App\Exports\ApprenantExport;
use App\Imports\ApprenantImport;
use App\Models\Apprenant;
use App\Models\Groupes;
use App\Models\GroupesApprenant;
use GMP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ApprenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes=Groupes::all();
        $apprenant =Apprenant::paginate(3);
        // dd($tasks);
        return view('apprenants.index',['groupes'=>$groupes,'apprenant'=>$apprenant]);
    }
    public function filter_group(Request $request){
        if($request->has('filter') && !empty($request->filter)){
            $apprenants = DB::table('Apprenant')
            ->select("*" )
                ->join('groupes_apprenant', 'Apprenant.id', '=', 'groupes_apprenant.Apprenant_id')
                ->join('Groupes', 'groupes_apprenant.Groupe_id', '=', 'Groupes.id')
                ->where('Groupes.id','Like','%'.$request->filter.'%')
                ->get();
                
                return response(['dataapprenants'=>$apprenants]); 
        }
        else{
            $apprenants=Apprenant::all();
            return response(['dataapprenants'=>$apprenants]);
            dd($apprenants);
        }
            
    }
    public function search_apprenant(Request $request){
        $searchapprenat=Apprenant::where('Nom','Like','%'.$request->searchapprenant.'%')->get();
        return response(['searchapprenat'=>$searchapprenat]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes=Groupes::all();
        // 
        return view('apprenants.create',['groupes'=>$groupes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'Nom'=>'required|max:50',
        //     'Prenom'=>'required',
        //     'Email'=>'required',
        //     'Phone'=>'required',
        //     'Adress'=>'required',
        //     'CIN'=>'required',
        //     'Date_naissance'=>'required',
        //     'Image'=>'required',
        // ]);
        
        if($request->has('Image')){
        $file=$request->Image;
        $Image=time(). '_' .$file->getClientOriginalName();
        $file->move(public_path('imageapprent'),$Image);
        }
        Apprenant::create([

            'Nom'=>$request->Nom,
            'Prenom'=>$request->Prenom,
            'Email'=>$request->Email,
            'Phone'=>$request->Phone,
            'Adress'=>$request->Adress,
            'CIN'=>$request->CIN,
            'Date_naissance'=>$request->Date_naissance,
            'Image'=>$Image
            
        ]);
        // GroupesApprenant::create([

        //     'Groupe_id'=>$request->Groupe_id,
        //     'Apprenant_id'=>$request->Apprenant_id,
            
        // ]);

        return redirect()->route('apprenant.index');
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
        $edit=Apprenant::findOrFail($id);
        $groupes=Groupes::all();
        return view('apprenants.edit',['edit'=>$edit,'groupes'=>$groupes]);
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
        // $request->validate([
        //     'Nom'=>'required|max:50',
        //     'Prenom'=>'required',
        //     'Email'=>'required',
        //     'Phone'=>'required',
        //     'Adress'=>'required',
        //     'CIN'=>'required',
        //     'Date_naissance'=>'required',
        //     'Image'=>'required',
        // ]);
        
        
        if($request->has('Imagee')){
            $file=$request->Imagee;
        $Image=time(). '_' .$file->getClientOriginalName();
        $file->move(public_path('imageapprent'),$Image);
        }
        else{
            $Image= $request->input("image");
        }
        $update=Apprenant::findOrFail($id);
        $update->Nom=$request->get('Nom');
        $update->Prenom=$request->get('Prenom');
        $update->Email=$request->get('Email');
        $update->Phone=$request->get('Phone');
        $update->Adress=$request->get('Adress');
        $update->CIN=$request->get('CIN');
        $update->Date_naissance=$request->get('Date_naissance');
        
        $update->Image=$Image;
        $update->save();


        return redirect('/apprenant')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Apprenant::findOrFail($id);
        $delete->delete();
        return redirect('/apprenant');
    }

     // export data format excel

     public function exportexcel(){
        return Excel::download(new ApprenantExport,'datapage.xlsx');
    }
     // import data format excel
     public function importexcel(Request $request){

        Excel::import(new ApprenantImport, $request->file);
        return redirect()->back();

    }

    //  Export data form PDF

    public function generatepdf(){

        $apprenant = Apprenant::all();
        $pdf = Pdf::loadView('pdf.apprenant', compact('apprenant'));
    return $pdf->download('apprenant.pdf');
    }
}
