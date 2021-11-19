@extends('layouts.app')
@section('title','Agregar Dato Demografico - Psicologia y Emprendimiento')
@section('main')
    {{-- {{dd(session()->all())}}  --}}
    <article class="article__agregar">
        <h2 class="h2__title">Agregar Dato Demográfico - {{$empresa->nombre}}</h2>
        @if (session('error'))
            <div class="div--error">
                <p>{{session('error')}}</p>
            </div> 
        @endif
        <form action="" method="post">
            @csrf
            <div class="form--create__dato">
                <section class="form--create--dato__titles">
                    <h4></h4>
                    <h4>Categoría</h4>
                </section>
                @foreach ($datosDemo as $dato)
                    <div class="border--bot"></div>
                    <section id="section--{{$dato->id}}">
                        <div class="form--create--dato--opciones__nombres">
                            <input type="checkbox" name="{{$dato->id}}" class="input--center">
                            <h4>{{$dato->nombre_dato}}</h4>
                        </div>
                        <div id="{{$dato->id}}">

                        </div>
                        <div id="form--create--dato__option--{{$dato->id}}">
                            @if (session('categorias'))
                                @foreach (session('categorias') as $item)
                                    @foreach ($item as $category => $array)
                                        @if ($category == $dato->id)
                                            @foreach ($array as $value)
                                                <div class="padding-all dg">
                                                    <label>Opción</label>
                                                    <input type="text" name="{{$dato->id}}[]" value="{{$value}}">
                                                </div>   
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach                                        
                            @endif
                        </div>
                    </section>                   
                @endforeach
            </div>
            <input type="submit" value="Agregar" class="btn">
        </form>
    </article>
    @php
        session()->forget('categorias');
    @endphp
@endsection
@section('js')
    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>--}}
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $.ajax({
            url: '{{url("/settings/")}}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': '{{Auth::user()->id}}',
            },
            type: 'POST',
            dataType: 'JSON',
            success: function (res) {
                if (res.logo != null) {
                    $('nav img').attr('src', "{{asset('img/empresas')}}" + '/' + res.logo);
                }
                if (res.color_header != null) {
                    $('header').css('background-color', res.color_header);
                }
                if (res.letras_header != null) {
                    $('nav a').css('color', res.letras_header);
                    $('nav a').css('border-color', res.letras_header);
                }
                if (res.color_menu != null) {
                    $('.li__index').css('background-color', res.color_menu);
                }
                if (res.letras_menu != null) {
                    $('.li__index a').css('color', res.letras_menu);
                }
                if (res.color_main != null) {
                    $('body').css('background-color', res.color_main);
                }
                if (res.letras_main != null) {
                    $('body').css('color', res.letras_main);
                    $('input[type="submit"]').css('color', res.letras_main);
                    $('.btn').css('border-color', res.letras_main);
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
    </script>
@endsection