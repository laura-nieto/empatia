@extends('layouts.app')
@section('title','Editar Instrucciones - Empatia 360°')
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
@endsection