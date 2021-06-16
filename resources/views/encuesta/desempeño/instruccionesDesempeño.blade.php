@extends('layouts.encuesta')
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
