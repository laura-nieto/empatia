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
    <tbody>
        @foreach ($persona as $pregunta)
            <tr>
                <td>{{$i}}</td>
                <td>{{$pregunta->pivot->respuesta}}</td>
            </tr>
            @php
                $i+=1;
            @endphp
        @endforeach
    </tbody>
</table>