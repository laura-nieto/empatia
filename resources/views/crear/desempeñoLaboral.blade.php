@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Empatia 360°')
@section('main')
    @if (session('desempeño.guardar'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('desempeño.guardar')}}</p>
        </div>
    @endif
    @if (session('desempeño.send'))
        <div class="div--error">
            <p>
                Tanto el nombre como el cargo en <strong>Autoevaluación</strong> deben estar completos.
            </p>
        </div>
    @endif
    @if (session('desempeño.error'))
        <div class="div--error">
            <p>{{session('desempeño.error')}}</p>
        </div>
    @endif
    <h2 class="h2__title">Desempeño Laboral - {{$nombreEmpresa->nombre}}</h2>
    <form action="" method="post" class="form__desempeño">
        @csrf
        <a href="/enviar/guardados/{{$nombreEmpresa->id}}" class="btn type-btn justify-self-center">Previsualizar</a>
        <a href="/cargar/desempenio/{{$nombreEmpresa->id}}" class="btn type-btn justify-self-center">Cargar Datos</a>
        <div class="form--desempeño__div evaluar color-new-violet">
            <label for="">Es su Autoevaluacion</label>
            <input type="text" name="autoevaluacion[]" placeholder="Nombre">
            <input type="email" name="autoevaluacion[]" placeholder="E-mail">
            <input type="text" name="autoevaluacion[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-red">
            <label for="">Eres su Supervisor</label>
            <input type="text" name="supervisor[]" placeholder="Nombre">
            <input type="email" name="supervisor[]" placeholder="E-mail">
            <input type="text" name="supervisor[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-blue">
            <label for="">Eres su Subalterno</label>
            <input type="text" name="subalterno[]" placeholder="Nombre">
            <input type="email" name="subalterno[]" placeholder="E-mail">
            <input type="text" name="subalterno[]" placeholder="Cargo">
        </div>
        <div class="form--desempeño__div color-new-orange">
            <label for="">Eres su Compañero</label>
            <input type="text" name="companiero[]" placeholder="Nombre">
            <input type="email" name="companiero[]" placeholder="E-mail">
            <input type="text" name="companiero[]" placeholder="Cargo">
        </div>
        <input type="submit" name="submitButton" value="Guardar Datos" class="btn btn-center margin-bot">
    </form>
@endsection