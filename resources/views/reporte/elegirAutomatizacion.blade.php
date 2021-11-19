@extends('layouts.app')
@section('title','Reporte Automatizacion - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Automatización de prueba - Elegir Evaluado</h2>
    <ul class="ul__persona">
        @foreach ($datos as $dato)
            <li><a href="{{request()->url()}}/{{$dato->id}}">{{$dato->nombre}}</a></li>
        @endforeach
    </ul>
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
            if (res.color_main != null) {
                $('body').css('background-color', res.color_main);
            }
            if (res.letras_main != null) {
                $('body').css('color', res.letras_main);
                $('input[type="submit"]').css('color', res.letras_main);
                $('.btn').css('color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection