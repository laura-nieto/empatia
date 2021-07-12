@extends('layouts.encuesta')
@section('main')
    <div class="encuesta--div__explain">
        <p>
            Responder de acuerdo a lo que perciba dentro de su ambiente laboral, eligiendo alguna de las opciones que a continuación se presenta. Marque con una  "X" en el casillero correspondiente según su opinión.  
            <br>TED - Totalmente en desacuerdo
            <br>ED - En desacuerdo
            <br>NDANED - Ni de acuerdo ni en desacuerdo
            <br>DA - De acuerdo
            <br>TDS - Totalmente de acuerdo
        </p>
    </div>
    <form action="" method="post">
        @csrf
        <article class="article__encuesta">
            <table class="form--encuesta__table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="cell-width">TED</th>
                        <th class="cell-width">ED</th>
                        <th class="cell-width">NDANED</th>
                        <th class="cell-width">DA</th> 
                        <th class="cell-width">TDS</th>
                    </tr>  
                </thead>
                <tbody>
                    @foreach ($preguntas as $pregunta)
                        <tr>
                            <td>{{$pregunta->pregunta}}</td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="TED" class="radio-center" required></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="ED" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="NDANED" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="DA" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="TDS" class="radio-center"></td>
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