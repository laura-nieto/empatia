@extends('layouts.encuesta')
@section('encabezado')
    <div class="header--encuesta--logo">
        <h2 class="title--header--encuesta">Encuesta de Clima Laboral</h2>
        <img src="{{asset('img/psicologia_emprendimiento_border_white.jpeg')}}" alt="Logo de la empresa" class="header--encuesta__img--transparent">
    </div>
@endsection
@section('main')
    <div class="cellphone-atencion">
        <img src="{{asset('img/mobile-vertical-horizontal.png')}}" alt="Logo de atención" class="latido" title="">
        <p class="img__description">Para una mejor experiencia de llenado favor de cambiar la orientación de su equipo móvil.</p>
    </div>
    <div class="encuesta--div__explain">
        <p class="justify-line">
            Responder de acuerdo a lo que perciba dentro de su ambiente laboral, eligiendo alguna de las opciones que a continuación se presenta. Marque con una  "X" en el casillero correspondiente según su opinión.
        </p>
        <table>
            <tbody>
                <tr>
                    <td>TED</td>
                    <td>Totalmente en desacuerdo</td>
                </tr>
                <tr>
                    <td>ED</td>
                    <td>En desacuerdo</td>
                </tr>
                <tr>
                    <td>NDANED</td>
                    <td>Ni de acuerdo ni en desacuerdo</td>
                </tr>
                <tr>
                    <td>DA</td>
                    <td>De acuerdo</td>
                </tr>
                <tr>
                    <td>TDA</td>
                    <td>Totalmente de acuerdo</td>
                </tr>
            </tbody>
        </table>
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
                        <th class="cell-width">TDA</th>
                    </tr>  
                </thead>
                <tbody class="font-size">
                    @foreach ($preguntas as $pregunta)
                        <tr>
                            <td class="justify-line">{{$pregunta->pregunta}}</td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="TED" class="radio-center" required></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="ED" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="NDANED" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="DA" class="radio-center"></td>
                            <td ><input type="radio" name="{{$pregunta->id}}" value="TDA" class="radio-center"></td>
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