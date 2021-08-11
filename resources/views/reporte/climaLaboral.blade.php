@extends('layouts.app')
@section('title','Reporte Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Clima Laboral - {{$empresaNombre}}</h2>
    <article class="article__report">
        <table class="form--clima__table ancho-completo">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th> 
                    @foreach ($array_datos as $dato)
                        <th>{{$dato}}</th>
                    @endforeach
                    @foreach($preguntas as $pregunta)
                        <th>{{$pregunta->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                    @php
                        $viewDatos = json_decode($dato->datos_demograficos,true);
                    @endphp
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        <td>{{$dato->mail}}</td>
                        @foreach ($viewDatos as $item)
                            <td>{{$item}}</td>
                        @endforeach
                        @foreach ($dato->encuesta_clima as $rta)
                            <td>{{$rta->pivot->respuesta}}</td> 
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    <article class="paginator">

    </article>
    <article class="reporte--download">
        <a href='/exportar/clima-laboral/{{$empresa}}' class="btn margin-bot">Excel</a>
    </article>
@endsection