@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Empatia 360°')
@section('main')
    @if (session('desempeño.send'))
        <div class="div--error">
            <p>
                Tanto <strong>Nombre</strong> como <strong>Cargo</strong> de Autoevaluacion deben estar completados
            </p>
        </div>
    @endif
    <h2 class="h2__title">Desempeño Laboral - {{$nombreEmpresa}}</h2>
    <form action="" method="post" class="form__desempeño">
        @csrf
        <div class="form--desempeño__div evaluar color-new-violet">
            <label for="">Es su Autoevaluacion</label>
            <input type="text" name="autoevaluacion[]" placeholder="Nombre">
            <input type="email" name="autoevaluacion[]" placeholder="E-mail">
            <input type="text" name="autoevaluacion[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-red">
            <label for="">Es su Supervisor</label>
            <input type="text" name="supervisor[]" placeholder="Nombre">
            <input type="email" name="supervisor[]" placeholder="E-mail">
            <input type="text" name="supervisor[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-blue">
            <label for="">Es su Subalterno</label>
            <input type="text" name="subalterno[]" placeholder="Nombre">
            <input type="email" name="subalterno[]" placeholder="E-mail">
            <input type="text" name="subalterno[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-orange">
            <label for="">Es su Compañero</label>
            <input type="text" name="companiero[]" placeholder="Nombre">
            <input type="email" name="companiero[]" placeholder="E-mail">
            <input type="text" name="companiero[]" placeholder="Cargo">
        </div>
        <button class="btn btn-center">Enviar</button>
    </form>
@endsection