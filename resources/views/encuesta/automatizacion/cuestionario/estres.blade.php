<div class="encuesta--div__explain">
    <p>
        A continuación, elija 01 de las 07 alternativas por cada una de las preguntas expresadas en el cuestionario.
    </p>
    <p>Donde:</p>
    <table class="table--opciones">
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td>Nunca</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Rara vez</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Ocasionalmente</td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>Algunas veces</td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>Frecuentemente</td>
            </tr>
            <tr>
                <td class="text-center">6</td>
                <td>Generalmente</td>
            </tr>
            <tr>
                <td class="text-center">7</td>
                <td>Siempre</td>
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
                                $j=1;
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
