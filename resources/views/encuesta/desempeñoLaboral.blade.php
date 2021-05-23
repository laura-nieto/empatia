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
    <div class="encuesta--div__title">
        <h4 class="h4--title">Evaluado: Nombre</h4>
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
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, hic?</td>
                        <td ><input type="radio" name="" id="" value="1" class="radio-center"></td>
                        <td ><input type="radio" name="" id="" value="2" class="radio-center"></td>
                        <td ><input type="radio" name="" id="" value="3" class="radio-center"></td>
                        <td ><input type="radio" name="" id="" value="4" class="radio-center"></td>
                        <td ><input type="radio" name="" id="" value="5" class="radio-center"></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, hic?</td>
                        <td><input type="radio" name="" id="" class="radio-center"></td>
                        <td><input type="radio" name="" id="" class="radio-center"></td>
                        <td><input type="radio" name="" id="" class="radio-center"></td>
                        <td><input type="radio" name="" id="" class="radio-center"></td>
                        <td><input type="radio" name="" id="" class="radio-center"></td>
                    </tr>
                </tbody>
            </table>
        </article>
    </form>
@endsection