@extends('layouts.app')
@section('title','Agregar Dato Demografico - Empatia 360°')
@section('main')
    <article class="article__agregar">
        <h2 class="h2__title">Agregar Dato Demográfico - {{$empresa->nombre}}</h2>
        <form action="" method="post">
            @csrf
            <div class="form--create__dato">
                <section class="form--create--dato__titles">
                    <h4></h4>
                    <h4>Categoría</h4>
                </section>
                @foreach ($datosDemo as $dato)
                    <div class="border--bot"></div>
                    <section>
                        <div class="form--create--dato--opciones__nombres">
                            <input type="radio" name="{{$dato->id}}" class="input--center">
                            <h4>{{$dato->nombre_dato}}</h4>
                        </div>
                        <div id="{{$dato->id}}">

                        </div>
                        <div id="form--create--dato__option--{{$dato->id}}">

                        </div>
                    </section>
                    
                @endforeach
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </article>
@endsection
@section('js')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection