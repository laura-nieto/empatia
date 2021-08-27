@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Encuesta de Desempeño</h2>
        <img src="{{asset('img/Logo de Empatia PNG.png')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="encuesta--div__explain">
        <p class="justify-line">Favor, elija la alternativa que considere se alinea con el desempeño mostrado por la persona evaluada, de acuerdo al grado de intensidad. Donde:</p>
        <ol class="list--style--number">
            <li> Extremadamente satisfecho</li>
            <li> Muy satisfecho</li>
            <li> Moderadamente satisfecho</li>
            <li> Poco satisfecho</li>
            <li> No satifecho</li>
        </ol>
        <p class="justify-line">Recalcamos nuevamente. Procure ser objetivo e imparcial, centrándose en el desempeño profesional del evaluado como criterio fundamental.</p>
    </div>
    <div class="encuesta--div__title">
        <h4 class="h4--title">Evaluado: {{$nombre}} - {{$puesto}}</h4>
    </div>
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            @foreach ($preguntas as $pregunta)
                <table class="form--encuesta__table--desempeño">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{$pregunta->pregunta}}</th>
                            <th class="cell-width">Elegir</th>
                        </tr>  
                    </thead>
                    <tbody class="font-size">
                            <tr>
                                <td>5</td>
                                <td class="justify-line">{{$pregunta->opcion_1}}</td>
                                <td><input type="radio" name="{{$pregunta->id}}" value="5" class="radio-center" required></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="justify-line">{{$pregunta->opcion_2}}</td>
                                <td><input type="radio" name="{{$pregunta->id}}" value="4" class="radio-center" required></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="justify-line">{{$pregunta->opcion_3}}</td>
                                <td><input type="radio" name="{{$pregunta->id}}" value="3" class="radio-center" required></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="justify-line">{{$pregunta->opcion_4}}</td>
                                <td><input type="radio" name="{{$pregunta->id}}" value="2" class="radio-center" required></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td class="justify-line">{{$pregunta->opcion_5}}</td>
                                <td><input type="radio" name="{{$pregunta->id}}" value="1" class="radio-center" required></td>
                            </tr>
                        </tbody>
                </table>
            @endforeach
            <div class="div__btn">
                <input type="button" value="Atrás" onclick='goBack()' class="btn btn-no">
                <input type="submit" value="Siguiente" class="btn">
            </div>
        </article>
    </form>
@endsection
@section('js')
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
@endsection