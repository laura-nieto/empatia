<div class="encuesta--div__explain">
    <p>
        Siempre la suma de puntos de las dos casillas deber ser tres (3). A continuación considere: 0, 1, 2 ó 3 como posibles respuestas
    </p>
    <p>
        Considere responder
    </p>
    <p>
        De la pregunta <span class="color--green"><strong> 01 a la 09 según la importancia </strong></span> en su vida personal
    </p>
    <p>
        De la pregunta 10 a la 30, <span class="color--brown"><strong>para la frase más inaceptable</strong></span>, según su juicio
    </p>
</div>
<article class="form-automatizacion__article--valanti">
    <table>
        @foreach ($preguntas as $pregunta)
            @php
                $opciones = json_decode($pregunta->opciones);
                $opcion1 = $opciones[0];
                $opcion2 = $opciones[1];
            @endphp
            <tbody>
                <tr>
                    <td class="{{ $pregunta->pregunta <= 10 ? 'background--color--green' : 'background--color--brown'}} text-center">{{$pregunta->pregunta}}</td>
                    <td>{{$opcion1}}</td>
                    <td><input type="number" name="{{$pregunta->id}}[]" min="0" max="3" onkeyup="agregar(this.name,this.value)"></td>
                    <td><input type="number" name="{{$pregunta->id}}[]" min="0" max="3" onchange="sumar(this)"></td>
                    <td>{{$opcion2}}</td>
                </tr>
                <td colspan="5" class="text-center error-login suma-error" id="{{$pregunta->id}}"><strong>La suma debe ser de 3</strong></td>
            </tbody>
        @endforeach
    </table>
</article>