@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Psicología y</h4>
            <h4 class="title--logo">Emprendimiento</h4>
        </div>
    </div>
    <div class="header--encuesta--title header--encuesta--title--responsive">
        <h3>Evaluación de Competencias Profesionales</h3>
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
                <th>Prueba</th>
                <th class="th__time">Tiempo</th>
                <th class="th__time">Realizado</th>
            </thead>
            <tbody>
                @foreach ($datos->datos_categorias as $categoria)
                    <tr>
                        <td class="sentence-center">{{$categoria->codigo}}</td>
                        <td class="sentence-center">{{$categoria->pivot->tiempo}}</td>
                        <td class="sentence-center">
                            @if ($categoria->pivot->respondio == 0)
                                No                                
                            @else
                                Sí
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
