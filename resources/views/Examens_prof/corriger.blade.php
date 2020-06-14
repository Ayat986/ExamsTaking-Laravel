@extends('layouts.prof')

@section('content')

<div class="container" style='padding-top: 20px'>
	<div class="alert alert-info" role="alert">
 Corrigez vos examens ici !
</div>
 <div class="row ">


@foreach($examen as $examen)
<div class="list-group" style='padding-top: 15px;padding-left: 15px;'>
 <a href="#" class="list-group-item list-group-item-action active">
    {{$examen->titre}} - {{$examen->filière}} - {{$examen->module}}
  </a>	


@foreach($examen->examen_passers as $examen_passer)

<?php $id = $examen_passer->etudiant_id; ?>

@foreach($etudiants as $etudiant)

@if($etudiant->id == $id)
 <a href="/examen_passer_etudiant/{{$examen_passer->id}}" class="list-group-item list-group-item-action">Etudiant n° {{$examen_passer->etudiant_id}} - {{$etudiant->name}}</a>

@endif

@endforeach

@endforeach
</div>
@endforeach


</div>


</div>
@endsection