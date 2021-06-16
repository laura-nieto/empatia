@extends('layouts.app')
@section('title','Reporte Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización de prueba - Elegir Evaluado</h2>
    <ul class="ul__persona">
        @foreach ($datos as $dato)
            <li><a href="{{request()->url()}}/{{$dato->id}}">{{$dato->nombre}}</a></li>
        @endforeach
    </ul>
@endsection