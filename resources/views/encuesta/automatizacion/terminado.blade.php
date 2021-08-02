@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Evaluación de Competencias Profesionales</h2>
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="encuesta--fin">
        <h2>Ha respondido todas las categorias</h2>
        <h4>Favor cierre su navegador para culminar el proceso</h4>
    </div>
@endsection