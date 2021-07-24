@extends('layouts.app')
@section('title','Crear Automatización de Pruebas - Empatia 360°')
@section('main')
    <h2 class="h2__title">Cargar Preguntas de Automatización</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form__importMail">
        @csrf
        <input type="file" name="importAuto">
        <input type="submit" value="Cargar" class="btn">
    </form>
@endsection