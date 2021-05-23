@extends('layouts.encuesta')
@section('main')
    <article class="article__encuesta--datos">
        <form action="" method="post" class="form__encuesta--datos">
            @csrf
            <div class="div__datos">
                <label for="">Nombre</label>
                <input type="text">
            </div>
            <div class="div__datos">
                <label for="">Edad</label>
                <input type="text">
            </div>
            <div class="div__datos">
                <label for="">Genero</label>
                <input type="text">
            </div>
            <div class="div__datos">
                <label for="">Genero</label>
                <input type="text">
            </div>
            <div class="div__datos">
                <label for="">Genero</label>
                <input type="text">
            </div>
            <input type="submit" value="Siguiente" class="btn btn--center">
        </form>
    </article>
@endsection