@extends('layouts.encuesta')
@section('main')
    <section class="desempeño--title">    
        <h1 class="margin-bot">Evaluado</h1>
        @if(last(request()->segments()) == 'autoevaluacion')
            <h2 class="color-violet">{{$nombre}}</h2>
        @else
            <h2 class="
                @switch(last(request()->segments()))
                    @case('supervisor')
                        color-red
                        @break
                    @case('subalterno')
                        color-blue
                        @break
                    @case('companiero')
                        color-orange
                        @break
                @endswitch
            ">{{$nombre[0]}} - {{$nombre[1]}}</h2>
        @endif
        <form action="" method="post">
            @csrf
            <input type="submit" value="Siguiente" class="btn">
        </form>
    </section>
    
@endsection