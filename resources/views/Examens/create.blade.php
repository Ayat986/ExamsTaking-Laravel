@extends('layouts.prof')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Création d'un nouvel examen</div>

                    <div class="card-body">
                       
<form action="/examens" method="post">

@csrf

<div class="form-group">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titreHelp" placeholder="Entrez le titre">
    <!--<small id="titreHelp" class="form-text text-muted">Entrez le titre de l'examen </small>

@error('titre')
<small class="text-danger">{{ $message }}</small>
@enderror -->

  </div>

  <div class="form-group">
    <label for="filière">Filière</label>
    <input type="text" class="form-control" id="filière" name="filière" aria-describedby="filièreHelp" placeholder="Entrez la filière">
    <!--<small id="filièreHelp" class="form-text text-muted">Entrez la filière concernée </small>

   @error('filière')
<small class="text-danger">{{ $message }}</small>
@enderror -->

  </div>

  <div class="form-group">
    <label for="module">Module</label>
    <input type="text" class="form-control" id="module" name="module" aria-describedby="moduleHelp" placeholder="Entrez le module">
    <!--<small id="moduleHelp" class="form-text text-muted">Entrez le module en rapport avec l'examen </small>-->

    <!--@error('module')
<small class="text-danger">{{ $message }}</small>
@enderror -->
  </div>

  <div class="form-group">
    <label for="date_heure">Date et heure de passage</label>
    <input type="text" class="form-control" id="date_heure" name="date_heure" aria-describedby="date_heureHelp" placeholder="Entrez la date">
    <!--<small id="date_heureHelp" class="form-text text-muted">Entrez la date sous format yyyy-mm-jj h-m-s </small>-->

  <!-- @error('date_heure')
<small class="text-danger">{{ $message }}</small>
@enderror  -->
  </div>
  <div class="form-group">
    <label for="temps">Temps (en minutes)</label>
    <input type="text" class="form-control" id="temps" name="temps" aria-describedby="date_heureHelp" placeholder="Entrez le temps de passage">
  </div>

 <button type="submit" class="btn btn-primary">Valider</button>
</form> 


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection