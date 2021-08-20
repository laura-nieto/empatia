@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title header--encuesta--title--responsive">
        <h3>Encuesta de Desempeño Laboral</h3>
    </div>
    @if(!is_null($empresa->logo))
        <div class="header--logo--empresa">
            <img src="{{asset('img/empresas/'.$empresa->logo)}}" alt="Logo de la empresa" class="header--encuesta__img">
        </div>
    @endif
@endsection
@section('main')
    <section class="desempeño--title">
        <h2 class="margin-bot 
                @switch($persona->jerarquia)
                    @case('autoevaluacion')
                        color-violet
                        @break
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
        ">
            @switch($persona->jerarquia)
                @case('autoevaluacion')
                    Es tu Autoevaluación
                    @break
                @case('supervisor')
                    Es tu Supervisor
                    @break
                @case('subalterno')
                    Es tu Subalterno
                    @break
                @case('companiero')
                    Es tu Compañero
                    @break
            @endswitch
        </h2>
        <h2>
            {{$persona->evaluado}} - {{$persona->puesto_evaluado}}
        </h2>
        <form action="" method="post">
            @csrf
            <div class="div__btn">
                <input type="button" value="Atrás" onclick='goBack()' class="btn btn-no">
                <input type="submit" value="Siguiente" class="btn">
            </div>
        </form>
    </section>
    
@endsection
@section('js')
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
@endsection