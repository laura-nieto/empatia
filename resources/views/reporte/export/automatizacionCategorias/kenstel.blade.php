@php
    $i = 1;
@endphp
<table>
    <thead>
        <tr>
            <th colspan="3" align="center">KENSTEL</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th align="center">N° Pregunta</th>
            <th align="center">SI</th>
            <th align="center">NO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($persona as $pregunta)
            <tr>
                <td align="center">{{$i}}</td>
                <td align="center">{{ $pregunta->pivot->respuesta == 'si' ? 'X' : '' }}</td>
                <td align="center">{{ $pregunta->pivot->respuesta == 'no' ? 'X' : '' }}</td>
            </tr>
            @php
                $i+=1;
            @endphp
        @endforeach
    </tbody>
</table>