@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Encuesta de Clima Laboral</h2>
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="cellphone-atencion">
        <img src="{{asset('img/mobile-vertical-horizontal.png')}}" alt="Logo de atención" class="latido" title="">
        <p class="img__description">Para una mejor experiencia de llenado favor de cambiar la orientación de su equipo móvil.</p>
    </div>
    <div class="encuesta--div__explain">
        <h5>Comentarios</h5>
        <p class="justify-line">Favor, comparta sus comentarios con nosotros, los mismos que utilizaremos para optimizar el clima laboral. Al
            igual como sus respuestas del cuestionario, esta sección es anónima. 
            <strong>Las respuestas a estas preguntas son opcionales.</strong> 
        </p>
    </div>
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            <div class="div__container--libre">
                @foreach ($preguntas as $pregunta)
                <div class="libre--div">
                    <label for="" class="libre--label justify-line">{{$pregunta->pregunta}}</label>
                    <textarea cols="30" rows="10" name="{{$pregunta->id}}" class="libre--textarea"></textarea>
                </div>
                @endforeach
            </div>
            <div class="div__btn">
                <input type="button" value="Atrás" onclick='goBack()' class="btn btn-no">
                <input type="submit" value="Siguiente" class="btn">
            </div>
        </article>
    </form>
@endsection
@section('js')
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
@endsection