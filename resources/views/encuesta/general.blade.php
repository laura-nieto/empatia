@extends('layouts.encuesta')
@section('main')
    <article class="article__encuesta--datos">
        <form action="" method="post" class="form__encuesta--datos">
            @csrf
            <input type="hidden" name="empresa_id" value="{{$empresa_id}}">
            <div class="div__datos">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="{{$errors->has('nombre')?'has-error':''}}" value="{{old('nombre')}}">
                @error('nombre')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            <div class="div__datos">
                <label for="">E-mail</label>
                <input type="email" name="mail" class="{{$errors->has('mail')?'has-error':''}}" value="{{old('mail')}}">
                @error('mail')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            @foreach ($datos as $dato => $opciones)
                <div class="div__datos">
                    <label for="">{{$dato}}</label>
                    <select name="{{$dato}}" required>
                        <option value="" selected hidden>Elija una opción</option>
                        @foreach ($opciones as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <button type="submit" class="btn btn-center">Siguiente</button>
        </form>
    </article>
@endsection