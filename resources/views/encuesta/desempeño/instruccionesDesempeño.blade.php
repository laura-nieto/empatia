@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title">
        <h3>Encuesta de Desempeño Laboral</h3>
    </div>
@endsection
@section('main')
    <article class="article__instruction">
        <section class="section__instruction">
            <h4>Instrucciones Genereales</h4>
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
