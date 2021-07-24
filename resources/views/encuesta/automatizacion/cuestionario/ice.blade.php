<div class="encuesta--div__explain">
    <p>
        A continuación, elija 01 de las 07 alternativas por cada una de las preguntas expresadas en el cuestionario.
    </p>
    <p>Donde:</p>
    <table class="table--opciones">
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Nunca es mi caso</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Pocas veces es mi caso</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>A veces es mi caso</td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>Muchas veces es mi caso</td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>Siempre es mi caso</td>
            </tr>
        </tbody>
    </table>
</div>
<article class="form-automatizacion__article--estres">
    @php
        $i = 1;
    @endphp
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Items</th>
                <th>Respuestas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $pregunta)
                <input type="hidden" name="{{$pregunta->id}}">
                <tr>
                    <td class="text-center">{{$i}}</td>
                    <td>{{$pregunta->pregunta}}</td>
                    <td>
                        <select name="{{$pregunta->id}}">
                            <option value="" selected disabled hidden>Elija la opción</option>
                            @php
                                $j = 1;
                            @endphp
                            @foreach (json_decode($pregunta->opciones) as $opcion)
                                <option value="{{$j}}">{{$opcion}}</option>
                                @php
                                    $j+=1;
                                @endphp
                            @endforeach
                        </select>
                    </td>
                </tr>
                @php
                    $i +=1
                @endphp
            @endforeach
        </tbody>
    </table>
</article>