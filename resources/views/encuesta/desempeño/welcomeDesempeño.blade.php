@extends('layouts.encuesta')
@section('main')
<article class="article--welcome__clima">
    <section class="section--margin">
        <h2>Bienvenido!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam nemo voluptatibus, quis aliquam placeat ullam
            blanditiis aut officiis sed iste? Distinctio accusamus cum accusantium eum? Repudiandae tempore deleniti natus
            obcaecati ut vitae non culpa aperiam eligendi est ab, animi inventore, magnam suscipit, quia quisquam saepe?
            Inventore minima placeat animi possimus repellendus officiis architecto nobis quisquam error iure iste ullam
            accusantium dolor earum quidem aspernatur, distinctio vel odit esse reiciendis porro, nam ea dolores? Architecto
            cumque aperiam totam voluptas, hic repudiandae nam quod consequatur accusamus, expedita mollitia ipsum maiores
            minus sunt ex explicabo laboriosam obcaecati quis dolore ratione numquam reiciendis optio.
        </p>
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