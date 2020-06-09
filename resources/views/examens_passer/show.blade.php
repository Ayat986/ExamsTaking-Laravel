@extends('layouts.auth')


    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!--<div class="card">
                    <h5 class="card-header"><b> {{ $examen->titre }} </b></h5>

                    <div class="card-body"> -->
                        <h1 align="center"><b> {{ $examen->titre }} </b> </h1>
                    <div class="sidebar-nav-fixed affix">
            <h1 align="center"><b>Time <span id="timer" style="color: red">0.00 </span></b></h1>
          </div>
                    <form action="/examen_passer/{{$examen->id}}-{{Str::slug($examen->titre)}}" method="post">

@csrf
                    <div class="card mt-3"   >
                    <h5 class="card-header " > <b> Les questions : </b></h5>

                    <div class="card-body">
                    
                    <div>
                @foreach($examen->questions as $key => $question)

                @if(count($question->answers) > 1 ) <!-- qst choix multiple -->
                <div class="card mt-4">
                    <div class="card-header"> {{ $question->question }}</div>
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                        <label for="answer{{$answer->id}}">
                            <li class="list-group-item"> 
                            <input type="radio" name="reponses[{{$key}}][answer_id]" id="answer{{$answer->id}}" class="mr-2" value="{{$answer->id}}"> {{$answer->answer}}</li>  
                            <input type="hidden" name="reponses[{{$key}}][question_id]" value="{{$question->id}}" >

                        
                             </label>     
                       @endforeach
                    </ul>

                    @else  <!-- qsts simple -->

                    <div class="card mt-4">
                    <div class="card-header"> {{ $question->question}}</div>
                    <input type="text" style="height:150px;" name="reponsestxt[{{ $key }}][reponsetext]" class="mt-1" placeholder="Ecrivez votre réponse ici" >
                     <input type="hidden" name="reponsestxt[{{ $key }}][question_id]" value="{{$question->id}}" > 
                </div> 
                @endif

                </div>
                @endforeach
</div>
 
</div>
<div>
                    
</div>

</div>

                   
                    <div>
                    <button type="submit" class="btn btn-primary" id="submit">Valider mes réponses</button>

                    <a class="btn mt-4 btn-success" 
                    href="/home"> Annuler </a> 
                </div>

            </div>
        </div>        
    </div>

 </form>
<!-- script for time limitation of exam -->
<script type="text/javascript">

var timeoutHandle;

function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {

            if(mins > 1){

               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);

            }
        }
    }
    tick();
}

countdown('<?php echo $examen->temps ; ?>');

</script>

<!-- script for disable url -->
<script type="text/javascript">
    var time= '<?php echo $examen->temps; ?>';
    var realtime = time*60000;
    setTimeout(function () {
        alert('Time Out');
        document.getElementById('submit').click();
        window.location.href='/home';},
   realtime);

    
</script>

    @endsection