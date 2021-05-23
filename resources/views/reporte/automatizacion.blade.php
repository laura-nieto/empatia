@extends('layouts.app')
@section('title','Reporte Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización - Empresa - Prueba</h2>
    <article class="article__report">
        <table class="form--clima__table ancho-completo">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th> 
                    <th>Género</th> 
                    <th>País</th> 
                    <th>Título</th> 
                </tr>  
            </thead>
            <tbody>
                <tr>
                    <td>Jill</td>
                    <td>12</td>
                    <td>Femenino</td>
                    <td>Brasil</td>
                    <td>Secundario</td>
                </tr>
                <tr>
                    <td>Laura</td>
                    <td>14</td>
                    <td>Femenino</td>
                    <td>Brasil</td>
                    <td>Secundario</td>
                </tr>
            </tbody>
        </table>
    </article>
    <article class="paginator">

    </article>
    <article class="reporte--download">
        <button class="btn">Descargar en Excel</button>
    </article>
@endsection