@extends('layouts.app')
@section('title','Crear Automatización de Pruebas - Empatia 360°')
@section('main')
    <h2 class="h2__title">Importar Datos - {{$nombreEmpresa->nombre}}</h2>
    @if (session('success'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('success')}}</p>
        </div>
    @endif
    <article class="article__report">
        <table class="form--clima__table ancho-completo" id="table-autoevaluación">
            <thead>
                <tr>
                    <th>Evaluadores</th>
                    <th>Correo Electrónico</th>
                    <th>Evaluados</th>
                    <th>Puesto del evaluado</th>
                    <th>Relación Jerárquica</th>
                    <th>Modificar</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($evaluados as $persona)
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
                        <td class="text-center">
                            <a href="/datos/desempenio/modificar/{{$nombreEmpresa->id}}/{{$persona->id}}"><img src="{{asset('/img/edit.png')}}" alt="Icono editar" class="img--success"></a>
                            <a href="/datos/desempenio/borrar/{{$nombreEmpresa->id}}/{{$persona->id}}"><img src="{{asset('/img/cancel.png')}}" alt="Icono borrar" class="img--success"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    <form action="" method="post" class="form__importMail">
        @csrf
        <input type="submit" name="submitButton" value="Enviar" class="btn btn-center">
    </form>
@endsection