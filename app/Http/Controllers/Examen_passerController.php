<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\Examen_passer;
use App\Reponse;
use App\Reponsetxt;
use Auth;
use App\User;

class Examen_passerController extends Controller
{
    

    public function show(Examen $examen)
    {
    	return view('examens_passer.show',compact('examen'));
    }

    public function store(Request $request,Examen $examen)
    {
// save passage d un etudiant d un examen 
    	$examen_passer = new Examen_passer();
    	$examen_passer->examen_id = $examen->id;
    	$examen_passer->etudiant_id = Auth::id();

        $examen_passer->save();

// save reponses des qsts a choix multiples        
        $reponsesarray = [];

        if(!empty($request->reponses))
        { foreach($request->reponses as $reponse)
            {
                $reponsesarray[]= new Reponse($reponse);
            }

            
            $examen_passer->reponses()->saveMany($reponsesarray); }

// save reponses des questions simples 

             $reponsestxtarray = [];

             if(!empty($request->reponsestxt))
        {foreach($request->reponsestxt as $reponsetxt)
            {
                $reponsestxtarray[]= new Reponsetxt($reponsetxt);
            }

            
            $examen_passer->reponsestxt()->saveMany($reponsestxtarray); }
    	
        return redirect('/home');
    }

    public function corriger($examen_passer_id)
    {

        $examen_passer = Examen_passer::where('id',$examen_passer_id)->first();

         $examen = Examen::where('id',$examen_passer->examen_id)->first();

         $etudiant = User::where('id',$examen_passer->etudiant_id)->first();

         $reponse = Reponse::where('examen_passer_id',$examen_passer_id)->get();

         $reponsetxt = Reponsetxt::where('examen_passer_id',$examen_passer_id)->get();


        return view('/examens_prof.corriger2',compact('examen','examen_passer','etudiant','reponse','reponsetxt'));
    }

    public function noter(Request $request,$examen_passer_id)
    {
        Examen_passer::where('id',$examen_passer_id)->update(['note'=> $request->note]);
        
        return redirect('/examens_prof_corriger');
    }
}
