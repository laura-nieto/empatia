@extends('layouts.encuesta')
@section('main')
    <div class="temporizador">
        <h5>Tiempo Restante</h5>
        <span id="temporizador"></span>
    </div>
    <form action="" method="post" id="form-automatizacion">
        @csrf
        <input type="hidden" name="tiempo" value="{{$tiempo}}" id="tiempo">
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
                            <td><input type="radio" name="{{$pregunta->id}}" value="1" class="radio-center"></td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="2" class="radio-center"></td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="3" class="radio-center"></td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="4" class="radio-center"></td>
                            <td><input type="radio" name="{{$pregunta->id}}" value="5" class="radio-center"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Siguiente" class="btn">
        </article>
    </form>
@section('js')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
@endsection