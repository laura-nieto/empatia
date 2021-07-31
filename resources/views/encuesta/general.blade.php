@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img">
        <div>
            <h4 class="title--logo">Empatía</h4>
            <h4 class="title--logo">Consultores</h4>
        </div>
    </div>
    <div class="header--encuesta--title">
        <h3>Encuesta de Clima Laboral</h3>
    </div>
@endsection
@section('main')
    <article class="article__encuesta--datos">
        <h3>Encuesta de Clima Laboral</h3>
        <div class="div__datos">
            <h5>Datos Demográficos</h5>
            <p>Desde Empatía Consultores le garantizamos la selección de los siguientes datos demográficos con fines netamente estadísticos, los mismos que nos ayudarán a encontrar patrones de respuestas generales en la organización, de ninguna manera se contempla compartir datos individuales de ningún participante</p>
        </div>
        <form action="" method="post" class="form__encuesta--datos">
            @csrf
            <input type="hidden" name="empresa_id" value="{{$empresa_id}}">
            <div class="div__datos">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="{{$errors->has('nombre')?'has-error':''}}" value="{{$persona->nombre}}" readonly>
                @error('nombre')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            <div class="div__datos">
                <label for="">E-mail</label>
                <input type="email" name="mail" class="{{$errors->has('mail')?'has-error':''}}" value="{{$persona->mail}}" readonly>
                @error('mail')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            @if ($persona->importado)
                @foreach (json_decode($persona->datos_demograficos) as $key => $item)
                    @php
                        $key = str_replace('_',' ',$key);
                    @endphp
                    <div class="div__datos">
                        <label for="" class="text-capitalize">{{$key}}</label>
                        <input type="text" class="text-capitalize" value="{{$item}}" readonly>
                    </div>
                @endforeach  
            @else
                @foreach ($datos as $dato => $opciones)
                    @php
                        $dato = str_replace('_',' ',$dato);
                    @endphp
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
            @endif
            
            <button type="submit" class="btn btn-center">Siguiente</button>
        </form>
    </article>
@endsection