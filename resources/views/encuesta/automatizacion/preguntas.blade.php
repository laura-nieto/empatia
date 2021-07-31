@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta"></h2>
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="temporizador">
        <h5>Tiempo Restante</h5>
        <span id="temporizador"></span>
    </div>
    <form action="" method="post" id="form-automatizacion">
        @csrf
        <input type="hidden" name="tiempo" value="{{$tiempo}}" id="tiempo">
        @switch($idCategoria)
            @case(1)
                @include('encuesta.automatizacion.cuestionario.kenstel')
                @break
            @case(2)
                @include('encuesta.automatizacion.cuestionario.moss')
                @break
            @case(3)
                @include('encuesta.automatizacion.cuestionario.barsit')
                @break
            @case(4)
                @include('encuesta.automatizacion.cuestionario.kostick')
                @break
            @case(5)
                @include('encuesta.automatizacion.cuestionario.valanti')
                @break
            @case(6)
                @include('encuesta.automatizacion.cuestionario.wonderlick')
                @break
            @case(7)
                @include('encuesta.automatizacion.cuestionario.bfq')
                @break
            @case(8)
                @include('encuesta.automatizacion.cuestionario.disc')
                @break
            @case(9)
                @include('encuesta.automatizacion.cuestionario.asertividad')
                @break
            @case(10)
                @include('encuesta.automatizacion.cuestionario.liderazgo')
                @break
            @case(11)
                @include('encuesta.automatizacion.cuestionario.estres')
                @break
            @case(12)
                @include('encuesta.automatizacion.cuestionario.ice')
                @break
        @endswitch
        <div class="automatizacion__button--send">
            <input type="submit" value="Enviar" class="btn" id="sendButton">
        </div>
    </form>
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/temporizador.js')}}"></script>
    @if ($idCategoria == 5)
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    @endif
@endsection