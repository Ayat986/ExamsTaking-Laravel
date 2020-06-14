<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use Auth;
use App\User;
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
      

        $examen = Examen::where('prof_id',Auth::guard('professor')->id())->get();

        $etudiants = User::all();

       
        return view('/examens_prof.corriger',compact('examen','etudiants'));


      

    }
}
