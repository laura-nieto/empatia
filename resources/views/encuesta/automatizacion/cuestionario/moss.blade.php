<div class="encuesta--div__explain">
    <p>
        A continuación, marque la alternativa que usted considere la más acertada.
    </p>
</div>
<article class="form-automatizacion__article--moss">
    @php
        $i = 1;
    @endphp
    @foreach ($preguntas as $pregunta)
        <input type="hidden" name="{{$pregunta->id}}">
        <table>
            <thead>
                <tr>
                    <th>{{$i}}</th>
                    <th colspan="2">{{$pregunta->pregunta}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $op ='A';
                @endphp
                @foreach (json_decode($pregunta->opciones) as $opcion)
                    <tr>
                        <td></td>
                        <td><input type="radio" name="{{$pregunta->id}}" value="{{$op}}"></td>
                        <td>{{$opcion}}</td>
                    </tr>
                    @php
                        $op++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        @php
            $i +=1;
        @endphp
    @endforeach
    
</article>