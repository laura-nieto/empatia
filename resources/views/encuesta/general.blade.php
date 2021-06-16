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
                    $opciones = json_decode($dato->opciones);           
                @endphp
                <div class="div__datos">
                    <label for="">{{$dato->nombre_dato}}</label>
                    <select name="{{$dato->nombre_dato}}">
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