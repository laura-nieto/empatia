@extends('layouts.app')
@section('title','Crear Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Clima Laboral - Empresa</h2>
    <form action="" method="post" class="form__clima">
        <table class="form--clima__table">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Seleccionar</th> 
                </tr>  
            </thead>
            <tbody>
                <tr>
                    <td>Jill</td>
                    <td class="td-radio-center"><input type="radio" name="" id=""></td>
                </tr>
                <tr>
                    <td>Laura</td>
                    <td class="td-radio-center"><input type="radio" name="" id=""></td>
                </tr>
            </tbody>
        </table>
        <div class="form--clima--div__cantidad">
            <label for="">Cantidad de personas a enviar</label>
            <input type="text" name="who-send" id="who-send" onKeyUp="typewatch(crearInputs);">
        </div>
        <div class="form--clima--div__email">
            
        </div>
        <button class="btn">Enviar</button>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection