<div class="encuesta--div__explain">
    <p>
        Elija cual de las dos proposiciones están más de acuerdo con su manera de pensar (tenga en cuenta que hay algunas proposiciones se pueden repetir aleatoriamente, de darse el caso siga con el mismo procedimiento y elija una de las dos alternativas).
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
                        <td class="td--width"><input type="radio" name="{{$pregunta->id}}" value="{{$opcion}}"></td>
                    </tr>
                @endforeach
            </tbody>
        @endforeach
    </table>
</article>