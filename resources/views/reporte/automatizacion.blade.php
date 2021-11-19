@extends('layouts.app')
@section('title','Reporte Automatizacion - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Automatización - {{$persona->nombre}}</h2>
    <article class="article__report">
        <table class="form--automatizacion__table--report">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Respondio</th>
                </tr>                       
            </thead>
            <tbody>
                @foreach ($persona->datos_categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}</td>
                        <td>{{$categoria->pivot->respondio == 1 ? 'Sí' : 'No'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    
    <article class="reporte--download">
        <a href='/exportar/automatizacion/{{$persona->empresa_id}}/{{$persona->id}}' class="btn margin-bot color-white">Excel</a>
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