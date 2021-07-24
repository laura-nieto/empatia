@extends('layouts.app')
@section('title','Reporte Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización - {{$persona->nombre}}</h2>
    <article class="article__report">
        <table class="form--automatizacion__table--report">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Respondio</th>
                </tr>                       
            </thead>
            <tbody>
                @foreach ($persona->datos_categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->pivot->respondio == 1 ? 'Sí' : 'No'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    
    <article class="reporte--download">
        <a href='/exportar/automatizacion/{{$persona->empresa_id}}/{{$persona->id}}' class="btn margin-bot">Excel</a>
    </article>
@endsection