<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\Examen_passer;
use App\Reponse;
use App\Reponsetxt;
use Auth;

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
}
