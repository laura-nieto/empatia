<div class="encuesta--div__explain">
    <p>
        Seleccione una respuesta a la altura del "SI o "NO" según corresponda a su manera de ser, pensar o sentir. 
    </p>
</div>
<article class="form-automatizacion__article--kenstel">
    @php
        $i = 1;
    @endphp
    <table>
        <thead>
            <tr>
                <th colspan="2">Cuestionario</th>
                <th>SI</th>
                <th>NO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $pregunta)
                <input type="hidden" name="{{$pregunta->id}}">
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$pregunta->pregunta}}</td>
                    <td><input type="radio" name="{{$pregunta->id}}" value="si"></td>
                    <td><input type="radio" name="{{$pregunta->id}}" value="no"></td>
                </tr>
                @php
                    $i+=1;
                @endphp
            @endforeach
        </tbody>
    </table>
    {{-- <div class="paginator">
        {{ $preguntas->links() }}
    </div> --}}
</article>