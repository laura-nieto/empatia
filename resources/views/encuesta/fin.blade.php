@extends('layouts.encuesta')
@section('main')
    <div class="encuesta--fin">
        <h4>Encuesta de 
            @if (Request::segment(2) == 'clima-laboral')
                Clima Laboral
            @elseif(Request::segment(2) == 'desempenio-laboral')
                Desempeño Laboral
            @elseif(Request::segment(2) == 'automatizacion-de-pruebas')
                Automatizacion de pruebas
            @endif
        </h4>
        <h2>¡Gracias por su colaboración!</h2>
        <p>Favor cierre su navegador para culminar el proceso</p>
    </div>
@endsection