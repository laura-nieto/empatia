@php
    $i = 1;
@endphp
<table>
    <thead>
        <tr>
            <th colspan="2" align="center">BARSIT</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th align="center">N° Pregunta</th>
            <th align="center">Alternativas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($persona as $pregunta)
            @if ($i %5 === 0)
                <tr>
                    <td align="center">{{$i}}</td>
                    @foreach (json_decode($pregunta->pivot->respuesta) as $rta)
                        <td>{{$rta}}</td>
                    @endforeach
                </tr>
            @else
                <tr>
                    <td align="center">{{$i}}</td>
                    <td>{{$pregunta->pivot->respuesta}}</td>
                </tr>
            @endif
            @php
                $i+=1;
            @endphp
        @endforeach
    </tbody>
</table>