@extends('layouts.app')
@section('title','Agregar Dato Demografico - Empatia 360°')
@section('main')
    <article class="article__agregar">
        <h2 class="h2__title">Agregar Dato Demográfico</h2>
        <form action="" method="post">
            @csrf
            <div class="newEmpresa">
                <label for="name">Dato Demográfico</label>
                <input type="text" name="name" id="" placeholder="Nombre">
                @error('name')
                    <small class="error-login">{{$message}}</small>
                @enderror
            </div>
            <div class="form--clima--div__cantidad">
                <label for="">Cantidad de opciones</label>
                <input type="text" name="cant_opcion" id="cant_opcion" onKeyUp="typewatch(inputsOpciones);">
            </div>
            <div class="form--agregar--opciones">
            
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </article>
@endsection
@section('js')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection