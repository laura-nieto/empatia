@extends('layouts.app')
@section('title','Editar e-mail - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Agregar</h2>
    <div class="modify_container">
        <form action="" method="post" class="modify__form">
            @csrf
            <div class="editor--container">
                <textarea id="editor" class="ck-content" name="editar"></textarea>
            </div>
            <input type="submit" value="Modificar" class="btn editor__submit">
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#editor'))
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