@extends('layouts.app')
@section('title','Agregar Empresa - Psicologia y Emprendimiento')
@section('main')
    <article class="article__agregar">
        <h2 class="h2__title">Agregar Empresa</h2>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="newEmpresa">
                <label for="name">Nombre de la empresa</label>
                <input type="text" name="name" placeholder="Nombre">
                @error('name')
                    <small id="emailHelp" class="error-login">{{$message}}</small>
                @enderror
            </div>
            <div class="newEmpresa margin-top-bot">
                <label for="file">Logo de la Empresa</label>
                <input type="file" name="logo">
            </div>
            <input type="submit" value="Agregar" class="btn">
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
                $('#img-home').attr('src', "{{asset('img/empresas')}}" + '/' + res.logo);
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
                $('.btn').css('border-color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection