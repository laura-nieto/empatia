@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title {{is_null($empresa->logo)?'column-span-2':''}}">
        <h3>Encuesta de Clima Laboral</h3>
    </div>
    @if(!is_null($empresa->logo))
        <div class="header--logo--empresa">
            <img src="{{asset('storage/logos/'.$empresa->logo)}}" alt="Logo de la empresa" class="header--encuesta__img">
        </div>
    @endif
@endsection
@section('main')
    
@endsection