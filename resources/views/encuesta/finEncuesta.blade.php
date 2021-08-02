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
    <form action="" method="post" class="encuesta--fin__form">
        @csrf
        <h3>Encuesta de 
            @if (Request::segment(2) == 'clima-laboral')
                Clima Laboral
            @elseif(Request::segment(2) == 'desempenio-laboral')
                Desempeño Laboral
            @elseif(Request::segment(2) == 'automatizacion-de-pruebas')
                Evaluación de Competencias Profesionales
            @endif
        </h3>
        <p class="fin--bold">De haber culminado con éxito toda la encuesta favor de hacer click en el botón “Finalizar”, el mismo que se encuentra en la parte inferior de esta ventana.</p>
        <p>Debe considerar que una vez dado al botón “Finalizar”, usted no podrá volver a entrar nuevamente a la encuesta ni cambiar sus respuestas. Asimismo, considere que si usted no le da Click al botón “Finalizar” o cierra intempestivamente la encuesta sus resultados no serán grabados ni considerados.</p>
        <p>Si asi lo considera puede regresar oprimiendo el botón “Atrás” para cambiar alguna de sus respuestas. En el caso de estar satisfecho con lo respondido hasta el momento , favor dele al botón “Finalizar”.</p>

        <div class="fin--form__buttons">
            <input type="button" value="Atrás" onclick='goBack()' class="btn">
            <input type="submit" value="Finalizar" class="btn btn-yes">
        </div>
    </form>   
@endsection
@section('js')
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
@endsection