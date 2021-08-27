@extends('layouts.app')
@section('title','Importar datos de Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Importar Datos - {{$empresa->nombre}}</h2>
    <form action="" method="post" enctype="multipart/form-data" class="form__importMail">
        <a href="/exportar/plantilla/desempenio-laboral" class="download--template">Descargar Plantilla</a>
        @csrf
        <input type="file" name="importMail">
        <input type="submit" value="Cargar" class="btn">
    </form>
@endsection