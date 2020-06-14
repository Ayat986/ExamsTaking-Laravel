@extends('layouts.prof')

@section('content')



<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                   
                    <div class="card-body">
                    <div>
<form action="/examen_passer_corriger/{{$examen_passer->id}}" method="post">

@csrf                             
<div class="container p-3 my-3 bg-info text-white">
  <h2 align="center">Details :</h2>

   
    <p class="font-weight-bold" style="padding-left: 2rem;">Titre de l'examen : {{ $examen->titre }}</p>  <br>  
   

    <p class="font-weight-bold" style="padding-left: 2rem;">Filière  : {{ $examen->filière }}</p>    <br>
   
    
     
    <p class="font-weight-bold" style="padding-left: 2rem;">Nom de l'étudiant: {{ $etudiant->name  }}</p> <br>

    @if($examen_passer->note == null)

     <label for="note" class="font-weight-bold" style="padding-left: 2rem;color:red">Note :   </label>
     <input type="text" name="note" id="note">
     @else
     <label for="note" class="font-weight-bold" style="padding-left: 2rem;color:red;font-size: 20px;">Note :   </label>
     <input type="text" name="note" id="note" value="{{$examen_passer->note}}">
     
 @endif
                    </div>
                
                    </div>

<button type="submit" class="btn btn-success" id="submit">Noter</button> 
                    </div>
                </div>

    </form>

                <div class="card mt-3"   >
                    <h5 class="card-header " > <b> Les réponses de l'étudiant : </b></h5>

                    <div class="card-body">
                    
                    <div>
                @foreach($examen->questions as $question)
                
                @if(count($question->answers) > 1 )

                <div class="card mt-4">
                    <div class="card-header"> {{ $question->question}}</div>
                    @foreach($reponse as $reponse)
                    @if($reponse->question_id == $question->id)
                   <p class="font-weight-bold" style="padding-left: 2rem;color:red;"> {{$reponse->answer->answer}}</p>
                    </div>
                    @endif
                    @endforeach
                    @else

                    <div class="card mt-4">
                    <div class="card-header"> {{ $question->question}}</div>
                     @foreach($reponsetxt as $reponsetxt)
                	 @if($reponsetxt->question_id == $question->id)
					<p class="font-weight-bold" style="padding-left: 2rem;color:red;"> {{$reponsetxt->reponsetext}}</p>
 </div>
                @endif
                @endforeach

                @endif               
                @endforeach
</div>
</div>

</div>

</div>
</div>
</div>


@endsection