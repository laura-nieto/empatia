@extends('layouts.app')
@section('title','Importar e-mails - Empatia 360°')
@section('main')
    <h2 class="h2__title">Cargar Emails - {{$empresa->nombre}}</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form__importMail">
        <a href="/exportar/plantilla/emails" class="download--template">Descargar Plantilla</a>
        @csrf
        <input type="file" name="importMail">
        <input type="submit" value="Cargar" class="btn">
    </form>
@endsection