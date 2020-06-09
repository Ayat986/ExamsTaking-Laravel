@extends('layouts.prof')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Création d'une nouvelle question </div>

                    <div class="card-body">
                       
<form action="/examens/{{ $examen->id }}/questions" method="post">

@csrf

<div class="form-group">
    <label for="question">Enoncé de la question : </label>
    <input type="text" class="form-control" id="question" name="question[question]" aria-describedby="titreHelp" placeholder="Entrez la question">
    <!--<small id="titreHelp" class="form-text text-muted">Entrez le titre de l'examen </small>

@error('titre')
<small class="text-danger">{{ $message }}</small>
@enderror -->
</div>

 <div class="form-group">
  <fieldset>
    <legend>Les choix :</legend>

    
      <div class="form-group">
    <label for="answer1">Choix 1 :</label>
    <input type="text" class="form-control" id="answer1" name="answers[][answer]" aria-describedby="titreHelp" placeholder="Entrez la réponse ">
    </div>

    
      <div class="form-group">
    <label for="answer2">Choix 2 :</label>
    <input type="text" class="form-control" id="answer2" name="answers[][answer]" aria-describedby="titreHelp" placeholder="Entrez la réponse ">
    </div>

    <div>
      <div class="form-group">
    <label for="answer3">Choix 3 :</label>
    <input type="text" class="form-control" id="answer3" name="answers[][answer]" aria-describedby="titreHelp" placeholder="Entrez la réponse ">
    </div>

    
      <div class="form-group">
    <label for="answer4">Choix 4 :</label>
    <input type="text" class="form-control" id="answer4" name="answers[][answer]" aria-describedby="titreHelp" placeholder="Entrez la réponse ">
    </div>

  </fieldset>
</div>

 <button type="submit" class="btn btn-primary">Valider</button>
</form> 


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection