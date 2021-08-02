@php
    $i = 1;
@endphp
<table>
    <thead>
        <tr>
            <th colspan="2" align="center">E.L (Estilos de Liderazgo)</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th align="center">N° Pregunta</th>
            <th align="center">Respuesta</th>
        </tr>
    </thead>
    @foreach ($persona as $pregunta)
        <tbody>
            <tr>
                <td rowspan="2" align="center">{{$i}}</td>
                <td align="center">{{$pregunta->pivot->respuesta == 'A' ? 'X':''}}</td>
            </tr>
            <tr>
                <td align="center">{{$pregunta->pivot->respuesta == 'B' ? 'X':''}}</td>
            </tr>
            @php
                $i+=1;
            @endphp
        </tbody>
    @endforeach
</table>