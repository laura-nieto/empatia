@extends('layouts.app')
@section('title','Reporte Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Desempeño Laboral - {{$empresaNombre}}</h2>
    <article class="article__report">
        <h4>Autoevaluación:</h4>
        <table class="form--clima__table ancho-completo" id="table-autoevaluación">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Evaluado</th>
                    <th>Puesto del evaluado</th>
                    @foreach($preguntas as $item)
                        <th>{{$item->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($autoevaluacion as $dato)
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        @foreach ($dato->encuesta_desempenio as $key => $rta) 
                            @if($key==0)
                                <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                                <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                            @endif 
                            <td>{{$rta->pivot->respuesta}}</td>  
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>

    <article class="article__report">
        <h4>Supervisor:</h4>
        <table class="form--clima__table ancho-completo" id="table-supervisor">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Evaluado</th>
                    <th>Puesto del evaluado</th>
                    @foreach($preguntas as $item)
                        <th>{{$item->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($supervisor as $dato)
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        @foreach ($dato->encuesta_desempenio as $key => $rta)
                            @if($key==0)
                                <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                                <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                            @endif 
                            <td>{{$rta->pivot->respuesta}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>

    <article class="article__report">
        <h4>Subalterno:</h4>
        <table class="form--clima__table ancho-completo" id="table-subalterno">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Evaluado</th>
                    <th>Puesto del evaluado</th>
                    @foreach($preguntas as $item)
                        <th>{{$item->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($subalterno as $dato)
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        @foreach ($dato->encuesta_desempenio as $key => $rta)
                            @if($key==0)
                                <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                                <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                            @endif 
                            <td>{{$rta->pivot->respuesta}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>

    <article class="article__report">
        <h4>Compañero:</h4>
        <table class="form--clima__table ancho-completo" id="table-companiero">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Evaluado</th>
                    <th>Puesto del evaluado</th>
                    @foreach($preguntas as $item)
                        <th>{{$item->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($companiero as $dato)
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        @foreach ($dato->encuesta_desempenio as $key => $rta)
                            @if($key==0)
                                <td>{{json_decode($rta->pivot->evaluado)[0]}}</td>
                                <td>{{json_decode($rta->pivot->evaluado)[1]}}</td>
                            @endif 
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
        <a class="btn margin-bot">Excel</a>
    </article>
@endsection