@extends('layouts.app')
@section('title','Editar e-mail - Empatia 360°')
@section('main')
    <h2 class="h2__title">Modificar e-mail</h2>
    <div class="modify_container">
        <div id="editor">
            <textarea name="" id="" cols="20" rows="10" class="ck-content"></textarea>
        </div>
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
@endsection