@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Desempeño Laboral - Empresa</h2>
    <form action="" method="post" class="form__desempeño">
        @csrf
        <div class="form--desempeño__div evaluar color-violet">
            <label for="">Es su Autoevaluacion</label>
            <input type="text" name="autoevaluacion[]" placeholder="Nombre">
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="autoevaluacion[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-red">
            <label for="">Es su Supervisor</label>
            <input type="text" name="supervisor[]" placeholder="Nombre">
            <input type="text" name="supervisor[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-blue">
            <label for="">Es su Subalterno</label>
            <input type="text" name="subalterno[]" placeholder="Nombre">
            <input type="text" name="subalterno[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-orange">
            <label for="">Es su Compañero</label>
            <input type="text" name="companiero[]" placeholder="Nombre">
            <input type="text" name="companiero[]" placeholder="Cargo">
        </div>
        <button class="btn btn-center">Enviar</button>
    </form>
@endsection