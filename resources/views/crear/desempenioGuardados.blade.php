@extends('layouts.app')
@section('title','Crear Desempeño Laboral - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Previsualización de Datos - {{$nombreEmpresa->nombre}}</h2>
    @if (session('success'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('success')}}</p>
        </div>
    @endif
    <article class="article__report">
        {{-- <div class="btn-agregar">
            <a href="/datos/desempenio/agregar/{{$nombreEmpresa->id}}" class="btn btn-center type-btn">Agregar nuevo</a>
        </div> --}}
        <table class="form--clima__table ancho-completo" id="table-autoevaluación">
            <thead>
                <tr>
                    <th>Evaluadores</th>
                    <th>Correo Electrónico</th>
                    <th>Evaluados</th>
                    <th>Puesto del evaluado</th>
                    <th>Relación Jerárquica</th>
                    <th>Modificar</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($evaluados as $persona)
                    <tr>
                        <td>{{$persona->evaluador}}</td>
                        <td>{{$persona->mail}}</td>
                        <td>{{$persona->evaluado}}</td>
                        <td>{{$persona->puesto_evaluado}}</td>
                        <td>
                            @switch($persona->jerarquia)
                                @case('autoevaluacion')
                                    Autoevaluación
                                    @break
                                @case('supervisor')
                                    Es su Supervisor
                                    @break
                                @case('subalterno')
                                    Es su Subalterno
                                    @break
                                @case('companiero')
                                    Es su Compañero
                                    @break
                                            
                            @endswitch
                        </td>
                        <td class="text-center desempenio-modify">
                            <a href="/datos/desempenio/{{$nombreEmpresa->id}}/modificar/{{$persona->id}}"><img src="{{asset('/img/edit.png')}}" alt="Icono editar" class="img--success"></a>
                            <form action="{{route('borrar_datos',[$nombreEmpresa->id,$persona->id])}}" method="post" id="form-borrar">
                                @csrf
                                <button type="submit" class="no-button"><img src="{{asset('/img/cancel.png')}}" alt="Icono borrar" class="img--success"></button>
                            </form>
                            <a href="/datos/desempenio/{{$nombreEmpresa->id}}/agregar"><img src="{{asset('/img/add.png')}}" alt="Icono borrar" class="img--success"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    <form action="" method="post" class="form__importMail">
        @csrf
        <input type="submit" name="submitButton" value="Enviar" class="btn btn-center">
    </form>
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/sendDesempenio.js')}}"></script>
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