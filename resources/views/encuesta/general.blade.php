@extends('layouts.encuesta')
@section('main')
    <article class="article__encuesta--datos">
        <form action="" method="post" class="form__encuesta--datos">
            @csrf
            <input type="hidden" name="empresa_id" value="{{$empresa_id}}">
            @foreach ($datos as $dato)
                @if($dato=='nombre')
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <input type="text" name="{{$dato}}">
                    </div>
                @elseif($dato=='genero')
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <select name="{{$dato}}">
                            <option value="femenino">Masculino</option>
                            <option value="masculino">Femenino</option>
                        </select>
                    </div>
                @elseif($dato=='titulo')
                    <div class="div__datos">
                        <label for="">{{$dato}}</label>
                        <select name="{{$dato}}">
                            <option value="secundario completo">Secundario Completo</option>
                            <option value="universitario en curso">Universitario en Curso</option>
                            <option value="universitario finalizado">Universitario Finalizado</option>
                        </select>
                    </div>
                @endif
            @endforeach
            <button type="submit" class="btn btn-center">Siguiente</button>
        </form>
    </article>
@endsection