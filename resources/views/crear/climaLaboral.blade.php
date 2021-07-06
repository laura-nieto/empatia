@extends('layouts.app')
@section('title','Crear Clima Laboral - Empatia 360°')
@section('main')
    <h2 class="h2__title">Clima Laboral - {{$empresa->nombre}}</h2>
    <div class="div__importar">
        <a href="/importar/clima-laboral/{{last(request()->segments())}}" class="btn link-color">Cargar E-mails</a>
    </div>
    <div class="encuesta--div__explain">
        <p>
            Recuerde que para las opciones debe separar cada opción con una coma <strong>,</strong>
        </p>
    </div>
    <form action="" method="post" class="form__clima">
        @csrf
        <table class="form--clima__table">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Seleccionar</th> 
                </tr>  
            </thead>
            @foreach ($datosDemo as $dato)
                <tbody>
                    <tr>
                        <td>{{$dato->nombre_dato}}</td>
                        <td class="td-radio-center eleccion"><input type="radio" name="{{$dato->id}}"></td>
                    </tr>
                    <tr id="{{$dato->id}}">
                        
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div class="form--clima--div__cantidad">
            <label for="">Cantidad de personas a enviar</label>
            <input type="text" name="who_send" id="who-send" onKeyUp="typewatch(crearInputs);">
        </div>
        <div class="form--clima--div__email">
            @if ($emailsGuardados != null)
                @foreach($emailsGuardados as $email)
                    <div>
                        <label>E-mail</label>
                        <input type="email" name="email[]" value="{{$email->email}}">
                    </div>
                @endforeach
            @else
                
            @endif
        </div>
        <input type="submit" name="submitButton" value="Guardar Datos" class="btn">
        <input type="submit" name="submitButton" value="Enviar" class="btn">
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection