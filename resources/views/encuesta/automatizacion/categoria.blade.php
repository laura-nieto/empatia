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
        @foreach ($datos->datos_categorias as $categoria)
            @if ($categoria->id == $idCategoria)
                <h2 class="text-center">Instrucciones</h2>
                @switch($idCategoria)
                    @case(1)
                        @include('layouts.categories.kenstel')
                        @break
                    @case(2)
                        @include('layouts.categories.moss')
                        @break
                    @case(3)
                        <h5>LEA ESTO CON MUCHA ATENCIÓN</h5>
                        @include('layouts.categories.barsit')
                        @break
                    @case(4)
                        @include('layouts.categories.kostick')
                        @break
                    @case(5)
                        @include('layouts.categories.valanti')
                        @break
                    @case(6)
                        <h5>LEA CON TODO CUIDADO. HAGA EXACTAMENTE LO QUE SE LE DICE. NO EMPIECE EL DESARROLLO DEL CUESTIONARIO HASTA HABER COMPRENDIDO LOS EJEMPLOS:</h5>
                        @include('layouts.categories.wonderlick')
                        @break
                    @case(7)
                        <h5>LEA CON TODO CUIDADO. HAGA EXACTAMENTE LO QUE SE LE DICE. NO EMPIECE EL DESARROLLO DEL CUESTIONARIO HASTA HABER COMPRENDIDO LOS EJEMPLOS:</h5>
                        @include('layouts.categories.bfq')
                        @break
                    @case(8)
                        <h5>Como contestar</h5>
                        @include('layouts.categories.disc')
                        @break
                    @case(9)
                        @include('layouts.categories.asertividad')
                        @break
                    @case(10)
                        @include('layouts.categories.liderazgo')
                        @break
                    @case(11)
                        @include('layouts.categories.estres')
                        @break
                    @case(12)
                        @include('layouts.categories.ice')
                        @break
                @endswitch
                <div class="text--time">
                    <p>RANGO DE TIEMPO {{$categoria->pivot->tiempo}} MINUTOS</p>
                </div>
            @endif    
        @endforeach
    </section>

    <form action="" method="post" class="acept--terms">
        @csrf
        <button class="btn-terms btn-yes" name="true">Siguiente</button>
    </form>
</article>
@endsection