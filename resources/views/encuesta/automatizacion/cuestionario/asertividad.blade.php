<div class="encuesta--div__explain">
    <p>
        Este cuestionario consiste en una serie de situaciones sociales especìficas. Imagìnate presente en cada situaciòn lo más vívidamente posible, elige la respuesta más cercana a lo que harías o dirías en cada situación, y no lo que pienses que deberìas hacer o decir. 
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
            $i +=1    
        @endphp
    @endforeach
</article>