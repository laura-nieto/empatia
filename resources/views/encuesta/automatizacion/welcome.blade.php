@extends('layouts.encuesta')
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
                        <td class="sentence-center">{{$categoria->nombre}}</td>
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
