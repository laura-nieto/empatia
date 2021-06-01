@extends('layouts.encuesta')
@section('main')
    <section class="desempeño--title">    
        <h1>Evaluado</h1>
        @if(last(request()->segments()) == 'autoevaluacion')
            <h2 class="color--red">{{$nombre}}</h2>
        @else
            <h2 class="color--red">{{$nombre[0]}} - {{$nombre[1]}}</h2>
        @endif
        <form action="" method="post">
            @csrf
            <input type="submit" value="Siguiente" class="btn">
        </form>
    </section>
    
@endsection