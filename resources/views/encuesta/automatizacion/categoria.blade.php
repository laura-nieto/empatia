@extends('layouts.encuesta')
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin text-center">
        @foreach ($datos->datos_categorias as $categoria)
            @if ($categoria->id == $idCategoria)
                <h2>{{$categoria->nombre}}</h2>
                <p>El tiempo para realizar la prueba es de {{$categoria->pivot->tiempo}} minutos</p>
            @endif    
        @endforeach
    </section>

    <form action="" method="post" class="acept--terms">
        @csrf
        <button class="btn-terms btn-yes" name="true">Siguiente</button>
    </form>
</article>
@endsection