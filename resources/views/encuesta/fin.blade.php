@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Encuesta de 
            @if (Request::segment(2) == 'clima-laboral')
                Clima Laboral
            @elseif(Request::segment(2) == 'desempenio-laboral')
                Desempeño Laboral
            @elseif(Request::segment(2) == 'automatizacion-de-pruebas')
                Evaluación de Competencias Profesionales
            @endif
        </h2>
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="encuesta--fin">
        <h4>Encuesta de 
            @if (Request::segment(2) == 'clima-laboral')
                Clima Laboral
            @elseif(Request::segment(2) == 'desempenio-laboral')
                Desempeño Laboral
            @elseif(Request::segment(2) == 'automatizacion-de-pruebas')
                Evaluación de Competencias Profesionales
            @endif
        </h4>
        <h2>¡Gracias por su colaboración!</h2>
        <p>Favor cierre su navegador para culminar el proceso</p>
    </div>
@endsection