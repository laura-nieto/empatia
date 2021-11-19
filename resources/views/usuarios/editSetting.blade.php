@extends('layouts.app')
@section('title','Cambiar Tema - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Editar Colores</h2>
    @error('logo')            
        <div class="div--error">
            <img src="{{asset('/img/cancel.png')}}" alt="Wrong Image" class="img--success">
            <p>{{$message}}</p>
        </div>
    @enderror
    <article class="article-users-index">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-modify-logo mb-6">
                <div class="div__img">
                    @if ($setting->logo != null)
                        <figure>
                            <img src="{{asset('img/empresas/'.$setting->logo)}}" alt="Logo de la empresa" class="img-preview-colores">
                            <figcaption class="figure-caption">Imágen cargada.</figcaption>
                        </figure>
                    @else
                        <p>No hay imágen cargada</p>
                    @endif
                </div>
                <div class="div__file">
                    <input type="file" name="logo" id="logo">
                </div>
            </div>
            <div class="dg form--modify">
            <div class="justify-self-center">
                <h5 class="mb-2">Barra de Navegación</h5>
                <div class="input-colores mb-3">
                    <label for="color_header" class="mr-1">Color Fondo</label>
                    <input type="color" name="color_header" class="color-picker" value="{{$setting->color_header!=null? $setting->color_header:'#ffffff'}}">
                </div>
                <div class="input-colores">
                    <label for="letras_header" class="mr-1">Color Letras</label>
                    <input type="color" name="letras_header" class="color-picker" value="{{$setting->letras_header!=null?$setting->letras_header:'#0000ff'}}">
                </div>
            </div>
            <div class="justify-self-center">
                <h5 class="mb-2">Sección Principal</h5>
                <div class="input-colores mb-3">
                    <label for="color_main" class="mr-1">Color Fondo</label>
                    <input type="color" name="color_main" class="color-picker" value="{{$setting->color_main!=null?$setting->color_main:'#ffffff'}}">
                </div>
                <div class="input-colores">
                    <label for="letras_main" class="mr-1">Color Letras</label>
                    <input type="color" name="letras_main" class="color-picker" value="{{$setting->letras_main}}">
                </div>
            </div>
            <div class="justify-self-center">
                <h5 class="mb-2">Menú</h5>
                <div class="input-colores mb-3">
                    <label for="color_menu" class="mr-1">Color Fondo</label>
                    <input type="color" name="color_menu" class="color-picker" value="{{$setting->color_menu!=null?$setting->color_menu:'#f4c544'}}">
                </div>
                <div class="input-colores">
                    <label for="letras_menu" class="mr-1">Color Letras</label>
                    <input type="color" name="letras_menu" class="color-picker" value="{{$setting->letras_menu!=null?$setting->letras_menu:'#0000ff'}}">
                </div>
            </div>
            
            <input type="submit" class="btn" value="Modificar">
        </div>
        </form>
    </article>
@endsection
@section('js')
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
            if (res.color_main) {
                $('body').css('background-color', res.color_main);
            }
            if (res.letras_main) {
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