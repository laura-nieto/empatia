@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title header--encuesta--title--responsive">
        <h3>Encuesta de Desempeño Laboral</h3>
    </div>
    @if(!is_null($empresa->logo))
        <div class="header--logo--empresa">
            <img src="{{asset('img/empresas/'.$empresa->logo)}}" alt="Logo de la empresa" class="header--encuesta__img">
        </div>
    @endif
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
                @foreach ($cargo as $evaluado)
                    <tr>
                        <td class="text-bold">{{$evaluado->evaluado}}</td>
                        <td>{{$evaluado->puesto_evaluado}}</td>
                        <td>
                            @if ($evaluado->jerarquia == 'autoevaluacion')
                                Es tu Autoevaluación
                            @elseif($evaluado->jerarquia == 'companiero')
                                Eres su Compañero
                            @else
                                Eres su {{$evaluado->jerarquia}}
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