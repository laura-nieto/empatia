@php
    $i = 1;
@endphp
<table>
    <thead>
        <tr>
            <th colspan="2" align="center">ICE BARON</th>
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
                <td align="center">{{$i}}</td>
                <td align="center">{{$pregunta->pivot->respuesta}}</td>
            </tr>
            @php
                $i+=1;
            @endphp
        @endforeach
    </tbody>
</table>