<div class="encuesta--div__explain">
    <p>
        A continuación proceda a leer el enunciado y elija la alternativa que usted considere es la correcta.
    </p>
</div>
<article class="form-automatizacion__article--wonderlick">
    @php
        $i=1;
    @endphp
    @foreach ($preguntas as $pregunta)
        
        <input type="hidden" name="{{$pregunta->id}}">
        <section>
            <div class="wonderlick--question">
                @if ($i===23||$i===41)
                    <div class="wonderlick--question--grid">
                        <p>{{$i}}</p>
                        @foreach (json_decode($pregunta->pregunta) as $key => $item)
                            @if ($key == 0)
                                <p>{{$item[0]}}</p>
                            @elseif($key == 1)
                                <ol class="wonderlick--question__list">
                                    @foreach ($item as $li)
                                    <li>{{$li}}</li>
                                    @endforeach
                                </ol>
                            @endif
                        @endforeach
                    </div>
                @elseif($i==8||$i==17||$i==22||$i==37)
                    <div class="wonderlick--question--grid">
                        <p>{{$i}}</p>
                        @foreach (json_decode($pregunta->pregunta) as $key => $item)
                            @if ($key == 0)
                                <p>{{$item[0]}}</p>
                            @elseif($key == 1)
                                <ul class="wonderlick--question__ul">
                                    @foreach ($item as $li)
                                        @if ($li == '*input*')
                                            <li class="wonderlick--p"></li>
                                        @else
                                            <li>{{$li}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                @elseif($i==16||$i==40)
                    <div class="wonderlick--question--grid">
                        <p>{{$i}}</p>
                        @foreach (json_decode($pregunta->pregunta) as $key => $item)
                            @if ($key == 0)
                                <p>{{$item[0]}}</p>
                            @endif
                        @endforeach
                        <div class="wonderlick--question--column">
                            @foreach (json_decode($pregunta->pregunta) as $key => $item)
                                @if ($key != 0)
                                    <ul>
                                        @foreach ($item as $number)
                                            <li>{{$number}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </div>      
                    </div>
                @elseif($i==13||$i==20||$i==26||$i==39||$i==44||$i==47)
                    <div class="wonderlick--question--grid">
                        <p>{{$i}}</p>
                        @foreach (json_decode($pregunta->pregunta) as $key => $item)
                            @if ($key == 0)
                                <p>{{$item[0]}}</p>
                            @else
                                <p class="wonderlic--question__p--column2">{{$item[0]}}</p>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="wonderlick--question--grid">
                        <p>{{$i}}</p>
                        <p>{{$pregunta->pregunta}}</p>
                    </div>
                @endif
                @if ($i===7||$i===38||$i===42||$i===49)
                    <img src="{{asset('img/wonderlick/'.$pregunta->imagen)}}" alt="">
                @endif
            </div>
            <div class="wonderlick--option">
                <ol class="{{$i==4||$i==32 ? 'wonderlick--question--justifi' : '' }}">
                    @php
                        $op ='A';
                    @endphp
                    @foreach (json_decode($pregunta->opciones) as $opcion)
                        <li><input type="radio" name="{{$pregunta->id}}" value="{{$op}}">{{$opcion}}</li>
                        @php
                            $op++;
                        @endphp
                    @endforeach
                </ol>
            </div>
        </section>
        @php
            $i+=1;
        @endphp
    @endforeach
</article>