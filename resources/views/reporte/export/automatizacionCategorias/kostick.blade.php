<table>
    <thead>
        <tr>
            <th colspan="3" align="center">KOSTICK</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th align="center">N° Pregunta</th>
            <th align="center">Premisa</th>
            <th align="center">Respuesta</th>
        </tr>
    </thead>
    @foreach ($persona as $pregunta)
        <tbody>
            @foreach (json_decode($pregunta->opciones) as $key => $opcion)
                <tr>
                    @if ($key == 0)
                        <td rowspan="2" align="center">{{$pregunta->pregunta}}</td>
                    @endif
                    <td align="center">{{$key == 0 ? 'A' : 'B'}}</td>
                    @if ($key == 0 && $pregunta->pivot->respuesta == 'A')
                        <td align="center">X</td>
                    @elseif($key == 1 && $pregunta->pivot->respuesta == 'B')
                        <td align="center">X</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    @endforeach
</table>