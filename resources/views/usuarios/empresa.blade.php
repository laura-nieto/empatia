@extends('layouts.app')
@section('title','Editar Imágen Empresa - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Editar Imágen Empresa</h2>
    <article class="article__logo">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-modify-logo">
                <div class="div__img">
                    @if ($empresa->logo != null)
                        <figure>
                            <img src="{{asset('img/empresas/'.$empresa->logo)}}" alt="Logo de la empresa" class="img-preview">
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
            <div class="mt-3 desempenio-modify">
                <input type="submit" value="Modificar" class="btn link-color">
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
            if (res.color_main != null) {
                $('body').css('background-color', res.color_main);
            }
            if (res.letras_main != null) {
                $('body').css('color', res.letras_main);
                $('input[type="submit"]').css('color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection
