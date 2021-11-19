@extends('layouts.app')
@section('title','Crear Automatización de Pruebas - Psicologia y Emprendimiento')
@section('main')
    <h2 class="h2__title">Automatización - {{$empresa->nombre}}</h2>
    @if (session('automatizacion.error'))
        <div class="div--error">
            <p>{{session('automatizacion.error')}}</p>
        </div>
    @endif
    <form action="" method="post" class="form__automatizacion">
        @csrf
        <article class="article__automatizacion">
            <section class="automatizacion__section">
                <div class="automatizacion__div">
                    <label for="puesto">Nombre de la Empresa</label>
                    <input type="text" name="empresa" id="empresa" value="{{old('empresa')}}">
                    @error('empresa')
                        <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="automatizacion__div">
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" id="name" value="{{old('nombre')}}">
                    @error('nombre')
                        <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="automatizacion__div">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}">
                    @error('email')
                        <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
            </section>
            <section class="automatizacion__table">
                <table class="form--clima__table ancho-completo">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Código</th>
                            <th>Seleccionar</th>
                            <th>Tiempo</th> 
                        </tr>  
                    </thead>
                    @foreach ($categorias as $categoria)
                        @if (Auth::user()->admin == 0)
                            <tbody>
                                <tr>
                                    <td>{{$categoria->nombre}}</td>
                                    <td>{{$categoria->codigo}}</td>
                                    <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                    <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @if($categoria->id == 1 && Auth::user()->permisos->kenstel)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 2 && Auth::user()->permisos->moss)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 3 && Auth::user()->permisos->barsit)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 4 && Auth::user()->permisos->kostick)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 5 && Auth::user()->permisos->valanti)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 6 && Auth::user()->permisos->wonderlick)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 7 && Auth::user()->permisos->bfq)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 8 && Auth::user()->permisos->disc)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 9 && Auth::user()->permisos->asertividad)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 10 && Auth::user()->permisos->liderazgo)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 11 && Auth::user()->permisos->estres)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @elseif($categoria->id == 12 && Auth::user()->permisos->ice)
                                    <tr>
                                        <td>{{$categoria->nombre}}</td>
                                        <td>{{$categoria->codigo}}</td>
                                        <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                        <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                                    </tr>
                                @endif
                                
                            </tbody>
                        @endif 
                    @endforeach
                </table>
            </section>
        </article>
        
        <input type="submit" value="Enviar" class="btn aling-center-self margin-bot">
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