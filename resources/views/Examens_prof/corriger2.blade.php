@extends('layouts.prof')

@section('content')

	<div class="container">





	<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    {{ $examenc->titre }}
  </button>
  @foreach(examen_passer as examen_passer)
  @if($examen_passer->examen_id == $examen->id)

  <a href="#" class="list-group-item list-group-item-action">{{examen_passer->etudiant_id}}</a>
@endif
  
</div>-->

@endforeach
</div>
@endsection