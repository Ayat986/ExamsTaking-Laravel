<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    
	public function create(Examen $examen)
	{
		return view('questions.create',compact('examen'));
	}

    public function create2(Examen $examen)
    {
        return view('questions.create2',compact('examen'));
    }

	public function store(Request $request,$examen)
    {

    	$question = new Question();
    	$question->examen_id = $examen;
    	$question->question = $request->input('question.question');

    	$question->save();

    	$answersarray = [];

    	foreach($request->answers as $answer)
    		{
    			$answersarray[]= new Answer($answer);
    		}

    	//$question->answers()->saveMany($request->input('answers.*.answer'));
            
    	$question->answers()->saveMany($answersarray);

    	

    	return redirect('/examens/'.$examen);


    }

    public function store2(Request $request,$examen)
    {

        $question = new Question();
        $question->examen_id = $examen;
        $question->question = $request->input('question.question');

        $question->save();

        return redirect('/examens/'.$examen);

    }
}
