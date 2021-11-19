@extends('layouts.app')
@section('title','Reporte Clima Laboral - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Clima Laboral - {{$empresaNombre}}</h2>
    <article class="article__report">
        <table class="form--clima__table ancho-completo">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th> 
                    @foreach ($array_datos as $dato)
                        <th>{{$dato}}</th>
                    @endforeach
                    @foreach($preguntas as $pregunta)
                        <th>{{$pregunta->pregunta}}</th>
                    @endforeach
                </tr>  
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                    @php
                        $viewDatos = json_decode($dato->datos_demograficos,true);
                    @endphp
                    <tr>
                        <td>{{$dato->nombre}}</td>
                        <td>{{$dato->mail}}</td>
                        @foreach ($viewDatos as $item)
                            <td>{{$item}}</td>
                        @endforeach
                        @foreach ($dato->encuesta_clima as $rta)
                            <td>{{$rta->pivot->respuesta}}</td> 
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    <article class="paginator">

    </article>
    <article class="reporte--download">
        <a href='/exportar/clima-laboral/{{$empresa}}' class="btn margin-bot color-white">Excel</a>
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