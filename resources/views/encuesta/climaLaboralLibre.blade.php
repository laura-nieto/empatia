@extends('layouts.encuesta')
@section('main')
    <div class="encuesta--div__explain">
        <h5>Comentarios</h5>
        <p>Favor, comparta sus comentarios con nosotros, los mismos que utilizaremos para optimizar el clima laboral. Al
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
                    <label for="" class="libre--label">{{$pregunta->pregunta}}</label>
                    <textarea cols="30" rows="10" name="{{$pregunta->id}}" class="libre--textarea"></textarea>
                </div>
                @endforeach
            </div>
            <input type="submit" value="Siguiente" class="btn">
        </article>
    </form>
@endsection
