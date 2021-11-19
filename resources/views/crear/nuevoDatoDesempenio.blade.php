@extends('layouts.app')
@section('title','Nuevo dato Desempeño Laboral - Psicologia y Emprendimiento')
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
@section('js')
<script>
    $.ajax({
        url: '{{url("/settings/")}}',
        data: {
            '_token': '{{ csrf_token() }}',
            'id': '{{Auth::user()->id}}',
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (res) {
            if (res.logo != null) {
                $('nav img').attr('src', "{{asset('img/empresas')}}" + '/' + res.logo);
            }
            if (res.color_header != null) {
                $('header').css('background-color', res.color_header);
            }
            if (res.letras_header != null) {
                $('nav a').css('color', res.letras_header);
                $('nav a').css('border-color', res.letras_header);
            }
            if (res.color_menu != null) {
                $('.li__index').css('background-color', res.color_menu);
            }
            if (res.letras_menu != null) {
                $('.li__index a').css('color', res.letras_menu);
            }
            if (res.color_main != null) {
                $('body').css('background-color', res.color_main);
            }
            if (res.letras_main != null) {
                $('body').css('color', res.letras_main);
                $('input[type="submit"]').css('color', res.letras_main);
                $('.btn').css('color', res.letras_main);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    })
</script>
@endsection