@extends('layouts.app')
@section('title','Crear Dato de Desempeño Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Modificar dato</h2>
    <form action="" method="post" class="dg form--modify">
        @csrf
        <div class="form--desempeño__div">
            <label for="">Evaluador</label>
            <input type="text" name="evaluador" value="{{$dato->evaluador}}" placeholder="Nombre del evaluador">
            @error('evaluador')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Email del Evaluador</label>
            <input type="email" name="mail" placeholder="E-mail" value="{{$dato->mail}}">
            @error('mail')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Puesto del evaluador</label>
            <input type="text" name="puesto_evaluador" value="{{$dato->puesto_evaluador}}" placeholder="Puesto del evaluador">
            @error('puesto_evaluador')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
        </div>
        <div class="form--desempeño__div">
            <label for="">Evaluado</label>
            <input type="text" name="evaluado" value="{{$dato->evaluado}}" placeholder="Nombre del evaluado">
            @error('evaluado')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Puesto del evaluado</label>
            <input type="text" name="puesto_evaluado" value="{{$dato->puesto_evaluado}}" placeholder="Puesto del evaluado">
            @error('puesto_evaluado')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
            <label for="">Jerarquía</label>
            <select name="jerarquia">
                <option {{$dato->jerarquia == 'autoevaluacion' ? 'selected':''}}  value="autoevaluacion">Autoevaluación</option>
                <option {{$dato->jerarquia == 'supervisor' ? 'selected':''}} value="supervisor">Supervisor</option>
                <option {{$dato->jerarquia == 'subalterno' ? 'selected':''}} value="subalterno">Subalterno</option>
                <option {{$dato->jerarquia == 'companiero' ? 'selected':''}} value="companiero">Compañero</option>
            </select>
            @error('jerarquia')
                <small id="emailHelp" class="error-login">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" value="Modificar" class="btn">
    </form>
@endsection