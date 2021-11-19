@extends('layouts.app')
@section('title','Editar Instrucciones - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Modificar Instrucciones</h2>
    <div class="modify_container">
        <form action="" method="post" class="modify__form">
            @csrf
            <div class="editor--container">
                <h3>Instrucciones Generales</h3>
                <textarea id="editor" class="ck-content" name="editar1">{!! $instruccion1 !!}</textarea>
            </div>
            <div class="editor--container">
                <h3>Instrucciones para el llenado</h3>
                <textarea id="editor2" class="ck-content" name="editar2"> {!! $instruccion2 !!}</textarea>
            </div>
            <input type="submit" value="Modificar" class="btn editor__submit margin-bot">
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/translations/es.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#editor'),{
                language: 'es'
            })
            .catch( error => {
                console.error(error);
            });
        ClassicEditor
            .create( document.querySelector('#editor2'),{
                language: 'es'
            })
            .catch( error => {
                console.error(error);
            });
    </script>
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