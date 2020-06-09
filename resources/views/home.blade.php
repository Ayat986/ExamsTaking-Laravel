@extends('layouts.auth')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                          
 <div class="card-deck">        
       
                        @foreach( $examens as $examen ) 

                       <div class="card mt-4" style="width: 60rem;">
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
                <?php 
                $mytime = Carbon\Carbon::now();
           
                if(  $mytime->toDateTimeString() < $examen->date_heure  || $mytime->toDateTimeString() > date('Y-m-d H:i:s', strtotime("+1000 days",strtotime($examen->date_heure) )) ){  ?>
                
                <a type="button" class="btn btn-secondary btn-xs" disabled  >Passer cet examen </a>
                 <?php }
                else{ ?>
                <a href="/examen_passer/{{$examen->id}}-{{Str::slug($examen->titre)}}" class="btn btn-primary" >Passer cet examen </a>
                <?php }  ?>
                    
                    </div>
                    </div>
                 
@endforeach

                   


            </div>
        </div>
    </div>
    @endsection