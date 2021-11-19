@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Encuesta de Desempeño</h2>
        <img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            <div class="div__container--libre">  
                @foreach ($preguntas as $pregunta)        
                    <div class="libre--div">
                        <label for="" class="libre--label font-size">{{$pregunta->pregunta}}</label>
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