@extends('layouts.app')
@section('title','Crear Automatización de Pruebas - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización - {{$empresa->nombre}}</h2>
    <form action="" method="post" class="form__automatizacion">
        @csrf
        <article class="article__automatizacion">
            <section class="automatizacion__section">
                <div class="automatizacion__div">
                    <label for="puesto">Puesto al que aplica</label>
                    <input type="text" name="puesto" id="puesto">
                    @error('puesto')
                        <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="automatizacion__div">
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" id="name">
                    @error('nombre')
                        <small id="emailHelp" class="error-login">{{$message}}</small>
                    @enderror
                </div>
                <div class="automatizacion__div">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
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
                            <th>Seleccionar</th>
                            <th>Tiempo</th> 
                        </tr>  
                    </thead>
                    @foreach ($categorias as $categoria)
                        <tbody>
                            <tr>
                                <td>{{$categoria->nombre}}</td>
                                <td><input type="checkbox" name="categorias[]" value="{{$categoria->id}}"></td>
                                <td><input type="text" name="tiempo[{{$categoria->id}}]" class="time--input"></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </section>
        </article>
        
        <button class="btn aling-center-self margin-bot">Enviar</button>
    </form>  

@endsection