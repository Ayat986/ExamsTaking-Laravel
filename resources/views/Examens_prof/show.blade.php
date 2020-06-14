@extends('layouts.prof')

    @section('content')
    <div class="container" style='padding-top: 20px'>

        <div class="alert alert-warning" role="alert">
  Vous pouvez modifier vos examens ici !
</div>
        <div class="row ">
            
                        @foreach( $examen as $examen ) 
                       
                       <div class="card mt-4" style="width: 18rem; margin:12px;" >
                    <img class="card-img-top" src="{{asset('geometriccolor.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ $examen->titre }} </h5>
                    <p class="card-text">
                        <p> <b> Filière : {{$examen->filière}}  <br/>
                            Professeur : {{$examen->professor['name'] }} <br/>
                            Module : {{$examen->module}} <br/>
                            Date : Le {{$examen->date_heure}} <br/>
                        <p style="color:red";> Temps : {{$examen->temps}} minutes </p>
</b>
                    </p>
                </p>
                      <div class="container">
  <div class="row">
    <div class="col-xs-2">        
                    <a href="/examens/{{$examen->id}}" class="btn btn-primary" >Details</a>
</div>
    <div class="col-xs-2" style="margin-left:8px;">
                    <form action="/examens/{{$examen->id}}" method="post">
                        @method('DELETE')
                        @csrf
                    <button class="btn btn-danger">Supprimer</button> 

</form>
</div>
</div>
</div>
                    </div>
                    </div>
                  
                 
@endforeach

                   


            </div>
        </div>
    </div>

    
    @endsection