@extends('layouts.encuesta')
@section('main')
    <div class="encuesta--div__explain">
        <p>
            Favor marque la alternativa que considere se alinea con el desempeño mostrado por la persona evaluada. De acuerdo al grado de intensidad
            <br>1- No satifecho
            <br>2- Poco satisfecho
            <br>3- Moderadamente satisfecho
            <br>4- Muy satisfecho
            <br>5- Extremadamente satisfecho
        </p>
    </div>
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            <table class="form--encuesta__table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="cell-width">1</th>
                        <th class="cell-width">2</th>
                        <th class="cell-width">3</th>
                        <th class="cell-width">4</th> 
                        <th class="cell-width">5</th>
                    </tr>  
                </thead>
                <tbody>
                    @foreach ($preguntas as $pregunta)
                        <tr>
                            <td>{{$pregunta->pregunta}}</td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="1" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="2" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="3" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="4" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="5" class="radio-center"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Siguiente" class="btn">
        </article>
    </form>
@endsection