@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title">
        <h3>Encuesta de Desempeño Laboral</h3>
    </div>
@endsection
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        {!! $mensaje !!}
    </section>
    <section class="welcome--table">
        <table>
            <thead>
                <th>Evaluado</th>
                <th>Puesto del evaluado</th>
                <th>Jerarquía del evaluado</th>
            </thead>
            <tbody>
                @foreach ($cargo as $name => $datos)
                    <tr>
                        <td class="color-white 
                        @switch($name)
                            @case('autoevaluacion')
                                color-background-violet
                                @break
                            @case('supervisor')
                                color-background-red
                                @break
                            @case('subalterno')
                                color-background-blue
                                @break
                            @case('companiero')
                                color-background-orange
                                @break
                        @endswitch
                        ">{{$datos[0]}}</td>
                        <td>{{$datos[1]}}</td>
                        <td>
                            @if ($name == 'autoevaluacion')
                                Es tu Autoevaluación
                            @elseif($name == 'companiero')
                                Eres su Compañero
                            @else
                                Eres su {{$name}}
                            @endif 
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </section>
    <form action="" method="post" class="acept--terms">
        @csrf
        <button class="btn-terms btn-yes" name="true">Siguiente</button>
    </form>
</article>
@endsection