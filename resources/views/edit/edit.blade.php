@extends('layouts.app')
@section('title','Editar Mensaje - Empatia 360°')
@section('main')
    <h2 class="h2__title">Modificar mensaje de {{$titulo}}</h2>
    <div class="modify_container">
        <form action="" method="post" class="modify__form">
            @csrf
            <div class="editor--container">
                <textarea id="editor" class="ck-content" name="editar">{!! $mensaje !!}</textarea>
            </div>
            <input type="submit" value="Modificar" class="btn editor__submit">
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
    </script>
@endsection