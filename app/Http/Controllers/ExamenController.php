<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use Auth;
use App\Examen_passer;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    public function create()
    {
    	return view("examens.create");
    }


    public function store(Request $request)
    {

    	$Examen = new Examen;
    	$Examen->prof_id = Auth::guard('professor')->id();
    	$Examen->titre = $request->titre;
    	$Examen->filière = $request->filière;
    	$Examen->module = $request->module;
    	$Examen->date_heure = $request->date_heure;
        $Examen->temps = $request->temps;

    	$Examen->save();


    	return redirect('/examens/'.$Examen->id);

    }

    public function show(\App\Examen $examen)
    {

        return view('examens.show',compact('examen'));
    }

    public function showtoprof()
    {

        $examen = Examen::where('prof_id',Auth::guard('professor')->id())->get();
        return view('examens_prof.show',compact('examen'));

    }

    public function destroy(\App\Examen $examen)
    {
        
        $examen->delete();

        return redirect('/examens_prof.show');
    }

    public function corriger()
    {
       /* $examenc = Examen::where('prof_id',Auth::guard('professor')->id())->get();
        //$examen_passer = Examen_passer::whereIn('examen_id',$examen->id())->get();

        foreach ($examenc as $examen) {
         $examenid[] = $examen->id;
        }
        //$examen_passer = DB::table('examen_passers')->whereIn('examen_id',$examenid)->get();

        $examen_passer = Examen_passer::where('examen_id',$examenid)->get(); */

        //$examen_passer = Examen_passer::all();

        $examen = Examen::where('prof_id',Auth::guard('professor')->id())->get();
        //dd($examen->examen_passers->pluck('etudiant_id'));

//$examen_passer = Examen_passer::all();

        /*foreach($examen->examen_passer as $examenp)
        {

        }*/

        /*foreach($examen_passer->rexamen() as $examen_passer)
        {
            echo $examen_passer->prof_id;
        }*/

        /*foreach($examen_passer as $examen_passer)
        {
            if($examen_passer->rexamen()->prof_id == Auth::guard('professor')->id())
            {
                $examen_passer2 = $examen_passer;
            }
        }*/

        return view('/examens_prof.corriger',compact('examen'));


       //dd($examen_passer2);
        //$ids = $examen->examen_passers->pluck('etudiant_id');

        //dd($ids);

    }
}
