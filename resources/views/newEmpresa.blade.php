@extends('layouts.app')
@section('title','Agregar Empresa - Empatia 360°')
@section('main')
    <article class="article__agregar">
        <h2 class="h2__title">Agregar Empresa</h2>
        <form action="" method="post">
            @csrf
            <div class="newEmpresa">
                <label for="name">Nombre de la empresa</label>
                <input type="text" name="name" id="" placeholder="Nombre">
                @error('name')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </article>
@endsection