@extends('layouts.app')
@section('title','Crear Clima Laboral - Psicologia y Emprendimiento')
@section('main')
    @if (session('create.emails') || session('destroy.emails')||session('import.datos')||session('import.emails'))
        <div class="div--success">
            <img src="{{asset('/img/check-icon2.png')}}" alt="Check image" class="img--success">    
            <p>{{session('create.emails')}}</p>
            <p>{{session('destroy.emails')}}</p>
            <p>{{session('import.datos')}}</p>
            <p>{{session('import.emails')}}</p>
        </div>
    @endif
    @if (session('null'))
        <div class="div--error">
            <p>{{session('null')}}</p>
        </div> 
    @endif
    @error('null')
        <small id="emailHelp" class="error-login">{{$message}}</small>
    @enderror
    <h2 class="h2__title">Clima Laboral - {{$empresa->nombre}}</h2>
    <div class="div__importar">
        <a href="/importar/clima-laboral/{{last(request()->segments())}}" class="btn link-color color-white">Cargar E-mails</a>
        {{-- <a href="/importar/clima-laboral/datos/{{last(request()->segments())}}" class="btn link-color">Cargar Datos</a> --}}
    </div>
    <form action="" method="post" class="form__clima">
        @csrf
        <table class="form--clima__table">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th></th>
                </tr>  
            </thead>
            @foreach ($empresa->opcionesDemograficos as $opcion)           
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center"><strong>{{$opcion->nombre_dato}}</strong></td>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach (json_decode($opcion->pivot->opciones) as $item)
                        @php
                            $i += 1;
                        @endphp
                        <tr>
                            <td>Opcion {{$i}}</td>
                            <td><input type="text" name="{{$opcion->nombre_dato}}[]" value="{{$item}}"></td>
                        </tr>
                    @endforeach                  
                </tbody>
            @endforeach
        </table>
        <div class="form--clima--div__cantidad">
            <label for="">Cantidad de personas a enviar</label>
            <input type="text" name="who_send" id="who-send" onKeyUp="typewatch(crearInputs());">
        </div>
        <div class="form--clima--div__email">
            @if ($importados !=null)
                @foreach ($importados as $importado)
                    <div class="div--email__guardados">
                        <div>
                            <label>Nombre</label>
                            <input type="text" name="importados[{{$importado->id}}][]" value="{{$importado->nombre}}">
                        </div>
                        <div class="div--email__guardados">
                            <label>E-mail</label>
                            <input type="email" name="importados[{{$importado->id}}][]" value="{{$importado->mail}}">
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($emailsGuardados != null)
                @foreach($emailsGuardados as $email)
                    <div class="div--email__guardados">
                        <div>
                            <label>Nombre</label>
                            <input type="text" name="nombre[]" value="{{$email->nombre}}">
                        </div>
                        <div class="div__email--borrar">
                            <label>E-mail</label>
                            <input type="email" name="email[]" value="{{$email->email}}">
                        </div>
                        <a href="/borrar/email/{{$empresa->id}}/{{$email->id}}"><img src="{{asset('/img/cancel.png')}}" alt="Icono borrar" class="img--success"></a>
                    </div>
                @endforeach               
            @endif
        </div>
        <input type="submit" name="submitButton" value="Guardar Datos" class="btn">
        <input type="submit" name="submitButton" value="Enviar" class="btn">
    </form>
@endsection
@section('js')
    {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> --}}
    <script src="{{asset('js/app.js')}}"></script>
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