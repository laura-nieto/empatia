@extends('layouts.encuesta')
@section('main')
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