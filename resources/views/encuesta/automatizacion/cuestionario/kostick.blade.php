<div class="encuesta--div__explain">
    <p>
        Elija solo una de las alternativas, escoja la que mejor corresponda con usted y marquela.
    </p>
</div>
<article class="form-automatizacion__article--kostick">
    <table>
        @foreach ($preguntas as $pregunta)
            <input type="hidden" name="{{$pregunta->id}}">
            <tbody>
                @foreach (json_decode($pregunta->opciones) as $key => $opcion)
                    <tr>
                        @if ($key == 0)
                            <td rowspan="2" class="text-center">{{$pregunta->pregunta}}</td>
                        @endif
                        <td>{{$opcion}}</td>
                        <td class="td--width"><input type="radio" name="{{$pregunta->id}}" value="{{ $key == 0 ? 'A' : 'B'}}"></td>
                    </tr>
                @endforeach
            </tbody>
        @endforeach
    </table>
</article>