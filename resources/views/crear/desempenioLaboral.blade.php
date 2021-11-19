@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Psicologia y Emprendimiento')
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
        <a href="/enviar/guardados/{{$nombreEmpresa->id}}" class="btn type-btn justify-self-center color-white">Previsualizar</a>
        <a href="/cargar/desempenio/{{$nombreEmpresa->id}}" class="btn type-btn justify-self-center color-white">Cargar Datos</a>
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