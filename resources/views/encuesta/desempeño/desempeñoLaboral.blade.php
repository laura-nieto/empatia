@extends('layouts.encuesta')
@section('main')
    <div class="encuesta--div__explain">
        <p>
            Favor, elija la alternativa que considere se alinea con el desempeño mostrado por la persona evaluada, de acuerdo al grado de intensidad. Donde:
            <br>1- No satifecho
            <br>2- Poco satisfecho
            <br>3- Moderadamente satisfecho
            <br>4- Muy satisfecho
            <br>5- Extremadamente satisfecho
        </p>
        <p><br>Recalcamos nuevamente. Procure ser objetivo e imparcial, centrándose en el desempeño profesional del evaluado como criterio fundamental.</p>
    </div>
    <div class="encuesta--div__title">
        @if(last(request()->segments()) == 'autoevaluacion')
            <h4 class="h4--title">Evaluado: {{$nombre}}</h4>
        @else
            <h4 class="h4--title">Evaluado: {{$nombre[0]}}</h4>
        @endif
    </div>
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            @foreach ($preguntas as $pregunta)
            <table class="form--encuesta__table">
                <thead>
                    <tr>
                        <th>{{$pregunta->pregunta}}</th>
                        <th class="cell-width">Elegir</th>
                    </tr>  
                </thead>
                <tbody>
                        <tr>
                            <td>{{$pregunta->opcion_1}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="5" class="radio-center" required></td>
                        </tr>
                        <tr>
                            <td>{{$pregunta->opcion_2}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="4" class="radio-center" required></td>
                        </tr>
                        <tr>
                            <td>{{$pregunta->opcion_3}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="3" class="radio-center" required></td>
                        </tr>
                        <tr>
                            <td>{{$pregunta->opcion_4}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="2" class="radio-center" required></td>
                        </tr>
                        <tr>
                            <td>{{$pregunta->opcion_5}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="1" class="radio-center" required></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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