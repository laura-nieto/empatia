@extends('layouts.app')
@section('title','Reporte Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Desempeño Laboral - {{$empresaNombre}}</h2>

    <article class="article__report">
        <table class="form--clima__table ancho-completo" id="table-autoevaluación">
            <thead>
                <tr>
                    <th>Evaluadores</th>
                    <th>Correo Electrónico</th>
                    <th>Evaluados</th>
                    <th>Puesto del evaluado</th>
                    <th>Relación Jerárquica</th>
                    @foreach($preguntas as $item)
                        <th>{{$item->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach($evaluaciones as $persona)
                    <tr>
                        <td>{{$persona->evaluador}}</td>
                        <td>{{$persona->mail}}</td>
                        <td>{{$persona->evaluado}}</td>
                        <td>{{$persona->puesto_evaluado}}</td>
                        <td>
                            @switch($persona->jerarquia)
                                @case('autoevaluacion')
                                    Autoevaluación
                                    @break
                                @case('supervisor')
                                    Es su Supervisor
                                    @break
                                @case('subalterno')
                                    Es su Subalterno
                                    @break
                                @case('companiero')
                                    Es su Compañero
                                    @break
                                            
                            @endswitch
                        </td>
                        @foreach($persona->encuesta_desempenio as $key => $rta) 
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
        <a href="/exportar/desempenio-laboral/{{$empresa}}" class="btn margin-bot">Excel</a>
    </article>
@endsection