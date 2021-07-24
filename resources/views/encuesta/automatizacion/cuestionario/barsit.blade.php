<div class="encuesta--div__explain">
    <p>
        A continuación elija la alternativa que considere correcta o escriba el número que considere es la respuesta al problema. 
    </p>
</div>
<article class="form-automatizacion__article--barsit">
    @php
        $i = 1;
    @endphp
    @foreach ($preguntas as $pregunta)
        <input type="hidden" name="{{$pregunta->id}}">
        <section>
            <div class="barsit--question">
                <p>{{$i}})</p>
                <p>{{$pregunta->pregunta}}</p>
            </div>
            <div class="barsit--option">
                @if ($i%5 === 0)
                    <ul>
                        @foreach (json_decode($pregunta->opciones) as $opcion)
                            @if ($opcion == '*input*')
                                <li><input type="number" name="{{$pregunta->id}}[]"></li>
                            @else
                                <li>{{$opcion}}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <ol>
                        @foreach (json_decode($pregunta->opciones) as $opcion)
                            <li><input type="radio" name="{{$pregunta->id}}" value="{{$opcion}}">{{$opcion}}</li>
                        @endforeach
                    </ol>
                @endif
            </div>
        </section>
        @php
            $i +=1    
        @endphp
    @endforeach
</article>