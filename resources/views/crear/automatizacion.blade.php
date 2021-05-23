@extends('layouts.app')
@section('title','Crear Automatización de Pruebas - Empatia 360°')
@section('main')
    <h2 class="h2__title">Automatización - Empresa</h2>
    <form action="" method="post" class="form__automatizacion">
        @csrf
        <article class="article__automatizacion">
            <section class="automatizacion__section">
                <div class="automatizacion__div">
                    <label for="puesto">Puesto al que aplica</label>
                    <input type="text" name="puesto" id="puesto">
                </div>
                <div class="automatizacion__div">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="automatizacion__div">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
                </div>
            </section>
            <section class="automatizacion__table">
                <table class="form--clima__table ancho-completo">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Seleccionar</th> 
                        </tr>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jill</td>
                            <td><input type="radio" name="" id=""></td>
                        </tr>
                        <tr>
                            <td>Laura</td>
                            <td><input type="radio" name="" id=""></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </article>
        
        <button class="btn aling-center-self">Enviar</button>
    </form>  

@endsection