@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Desempeño Laboral - Empresa</h2>
    <form action="" method="post" class="form__desempeño">
        <div class="form--desempeño__div evaluar">
            <label for="">Persona a evaluar</label>
            <input type="text" name="" id="" placeholder="Nombre">
            <input type="email" name="" id="" placeholder="E-mail">
        </div>
        <div class="form--desempeño__div">
            <label for="">Persona a evaluar: Supervisor</label>
            <input type="email" name="" id="" placeholder="Nombre">
        </div>
        <div class="form--desempeño__div">
            <label for="">Persona a evaluar: Subalterno</label>
            <input type="text" name="" id="" placeholder="Nombre">
        </div>
        <div class="form--desempeño__div">
            <label for="">Persona a evaluar: Compañero</label>
            <input type="email" name="" id="" placeholder="Nombre">
        </div>
        <button class="btn btn-center">Enviar</button>
    </form>
@endsection