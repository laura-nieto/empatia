@extends('layouts.app')
@section('title','Nuevo dato Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Nuevo Dato - {{$empresa->nombre}}</h2>
    <form action="" method="post" class="dg form--modify">
        @csrf
        <div class="form--desempeño__div">
            <label for="">Evaluador</label>
            <input type="text" name="evaluador"placeholder="Nombre del evaluador">
            @error('evaluador')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Email del Evaluador</label>
            <input type="email" name="mail" placeholder="E-mail">
            @error('mail')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Puesto del evaluador</label>
            <input type="text" name="puesto_evaluador" placeholder="Puesto del evaluador">
            @error('puesto_evaluador')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
        </div>
        <div class="form--desempeño__div">
            <label for="">Evaluado</label>
            <input type="text" name="evaluado" placeholder="Nombre del evaluado">
            @error('evaluado')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Puesto del evaluado</label>
            <input type="text" name="puesto_evaluado" placeholder="Puesto del evaluado">
            @error('puesto_evaluado')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Jerarquía</label>
            <select name="jerarquia">
                <option value="autoevaluacion">Autoevaluación</option>
                <option value="supervisor">Supervisor</option>
                <option value="subalterno">Subalterno</option>
                <option value="companiero">Compañero</option>
            </select>
            @error('jerarquia')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" value="Modificar" class="btn">
    </form>
@endsection