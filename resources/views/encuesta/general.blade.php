@extends('layouts.encuesta')
@section('main')
    <article class="article__encuesta--datos">
        <form action="" method="post" class="form__encuesta--datos">
            @csrf
            <input type="hidden" name="empresa_id" value="{{$empresa_id}}">
            <div class="div__datos">
                <label for="">Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div class="div__datos">
                <label for="">E-mail</label>
                <input type="text" name="mail">
            </div>
            @foreach ($datos as $dato)
                @php
                    $dato = str_replace('_',' ',$dato); 
                @endphp
                @if($dato=='genero')
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <select name="{{$dato}}">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                    </div>
                @elseif($dato=='grado de instruccion')
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <select name="{{$dato}}">
                            <option value="secundario completo">Secundario Completo</option>
                            <option value="universitario en curso">Universitario en Curso</option>
                            <option value="universitario finalizado">Universitario Finalizado</option>
                        </select>
                    </div>
                @else
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <input type="text" name="{{$dato}}">
                    </div>
                @endif
            @endforeach
            <button type="submit" class="btn btn-center">Siguiente</button>
        </form>
    </article>
@endsection