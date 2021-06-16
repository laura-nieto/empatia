@extends('layouts.app')
@section('title','Reporte Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización - {{$persona->nombre}}</h2>
    @foreach ($persona->datos_categorias as $categoria)
        <article class="article__report">
            <table class="form--automatizacion__table ancho-completo">
                <thead>
                    <tr>
                        <th colspan="6">{{$categoria->nombre}}</th>
                    </tr>
                    <tr>
                        <th class="text-center reporte-column-width"></th> 
                        <th class="text-center ">Completamente Verdadero[5]</th> 
                        <th class="text-center ">Bastante Verdadero[4]</th> 
                        <th class="text-center ">Ni verdadero ni falso[3]</th> 
                        <th class="text-center ">Bastante Falso[2]</th> 
                        <th class="text-center ">Completamente Falso[1]</th> 
                    </tr>  
                </thead>
                <tbody>
                    @foreach ($persona->encuesta_automatizacion as $encuesta)
                        @if ($encuesta->category_id == $categoria->id)
                            <tr>
                                <td>{{$encuesta->pregunta}}</td>
                                <td class="text-center">{{ $encuesta->pivot->respuesta == 5 ? 'Sí' : '' }}</td>
                                <td class="text-center">{{ $encuesta->pivot->respuesta == 4 ? 'Sí' : '' }}</td>
                                <td class="text-center">{{ $encuesta->pivot->respuesta == 3 ? 'Sí' : '' }}</td>
                                <td class="text-center">{{ $encuesta->pivot->respuesta == 2 ? 'Sí' : '' }}</td>
                                <td class="text-center">{{ $encuesta->pivot->respuesta == 1 ? 'Sí' : '' }}</td>
                            </tr>
                        @endif
                    @endforeach
                    
                </tbody>
            </table>
        </article>
    @endforeach
        
    <article class="paginator">

    </article>
    <article class="reporte--download">
        <a href='/exportar/automatizacion/{{$persona->empresa_id}}/{{$persona->id}}' class="btn margin-bot">Excel</a>
    </article>
@endsection