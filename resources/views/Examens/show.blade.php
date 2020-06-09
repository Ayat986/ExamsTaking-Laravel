@extends('layouts.prof')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <h5 class="card-header"><b> {{ $examen->titre }} </b></h5>
                    <div class="card-body">
                    <div>
                             
<div class="container p-3 my-3 bg-dark text-white">
  <h2 align="center">Details de l'examen :</h2>
   <div class="form-group">
    <label for="answer1">Titre : {{ $examen->titre }}</label>
    
    </div>

    
      <div class="form-group">
    <label for="answer2">Filière : {{ $examen->filière  }}</label>
    
    </div>

    <div>
      <div class="form-group">
    <label for="answer3">Module : {{ $examen->module }}</label>
    
    </div>
</div>
    
      <div class="form-group">
    <label for="answer4">Date et heure de passage : {{ $examen->date_heure }}</label>    
    </div>
    
    <div class="form-group">
    <label for="answer4">Temps de passage : {{ $examen->temps }} minutes </label>
    </div>

  
                    </div>
                    </div>

                    <a class="btn btn-primary" 
                    href="/examens/{{ $examen->id }}/questions/create2"> Ajouter une question simple </a>  
                    <a class="btn btn-primary" 
                    href="/examens/{{ $examen->id }}/questions/create"> Ajouter une question à choix multiple </a>  

                    <a class="btn btn-success" 
                    href="/professor"> Retour </a> 
                    </div>
                </div>


                <div class="card mt-3"   >
                    <h5 class="card-header " > <b> Les questions : </b></h5>

                    <div class="card-body">
                    
                    <div>
                @foreach($examen->questions as $question)
                
                @if(count($question->answers) > 1 )

                <div class="card mt-4">
                    <div class="card-header"> {{ $question->question}}</div>
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                        <li class="list-group-item"> {{$answer->answer}}</li>        
                       @endforeach
                    </ul>
                    </div>
                    @else

                    <div class="card mt-4">
                    <div class="card-header"> {{ $question->question}}</div>
                
                @endif

                </div>
                @endforeach
</div>
</div>

</div>


            </div>
        </div>
    </div>
    @endsection