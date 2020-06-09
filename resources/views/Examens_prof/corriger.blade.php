@extends('layouts.prof')

@section('content')

<div class="container">


@foreach($examen as $examen)

{{$examen->examen_passers->pluck('etudiant_id')}}


@endforeach
</div>
@endsection