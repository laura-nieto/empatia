<div class="encuesta--div__explain">
    <p>
        A continuación, de las 05 opciones elija la alternativa que usted considere se acerca más a su forma habitual de pensar, sentir o actuar.
    </p>
    <p>Donde:</p>
    <table class="table--opciones">
        <tbody>
            <tr>
                <td class="text-center">5</td>
                <td>Completamente VERDADERO para mí</td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>Bastante VERDADERO para mí</td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>Ni VERDADERO ni FALSO para mí</td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Bastante FALSO para mí</td>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>Completamente FALSO para mí</td>
            </tr>
        </tbody>
    </table>
</div>
<article class="form-automatizacion__article--bfq">
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1   
            @endphp
            @foreach ($preguntas as $pregunta)
                <input type="hidden" name="{{$pregunta->id}}">
                <tr>
                    <td class="text-center">{{$i}}</td>
                    <td>{{$pregunta->pregunta}}</td>
                    @foreach (json_decode($pregunta->opciones) as $item => $opcion)
                        <td><input type="radio" name="{{$pregunta->id}}" value="{{$item}}"></td>
                    @endforeach
                </tr>
                @php
                    $i+=1
                @endphp
            @endforeach
        </tbody>
    </table>
</article>