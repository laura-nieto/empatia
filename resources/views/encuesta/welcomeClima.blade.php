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
        <h3>Encuesta de Clima Laboral</h3>
    </div>
@endsection
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        {!! $mensaje !!}
    </section>
    <form action="" method="post" class="acept--terms">
        @csrf
        <button class="btn-terms btn-no" name="false">Terminar después</button>
        <button class="btn-terms btn-yes" name="true">Acepto</button>
    </form>
</article>
@endsection
