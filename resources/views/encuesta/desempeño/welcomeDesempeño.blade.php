@extends('layouts.encuesta')
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        {!! $mensaje !!}
    </section>
    <section class="welcome--table">
        <table>
            <thead>
                <th>Evaluado</th>
                <th>Rango</th>
                <th>Puesto</th>
            </thead>
            <tbody>
                @foreach ($cargos as $cargo => $nombre)
                    <tr>
                        <td>{{$nombre[0]}}</td>
                        <td>{{$cargo}}</td>
                        <td>{{$nombre[1]}}</td>
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