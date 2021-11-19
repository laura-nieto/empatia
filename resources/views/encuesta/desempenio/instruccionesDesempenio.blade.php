@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="Logo de la empresa" class="header--encuesta__img">
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
    <article class="article__instruction">
        <section class="section__instruction">
            <h4>Instrucciones Generales</h4>
            {!! $instruccion1 !!}
        </section>
        <section class="section__instruction2">
            <h4>Instrucciones para el llenado</h4>
            {!! $instruccion2 !!}
        </section>
        <form action="" method="post">
            @csrf
            <input type="submit" value="Siguiente" class="btn">
        </form>
    </article>
@endsection
