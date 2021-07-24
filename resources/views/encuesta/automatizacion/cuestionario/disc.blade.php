<div class="encuesta--div__explain">
    <p>
        A continuación escoja la palabra que más lo(a) represente y márquela en la columna Mas (+)  y escoja una palabra que menos lo(a) represente y márquela en la columna Menos (-).
    </p>
</div>
<article class="form-automatizacion__article--disc">
    @foreach ($preguntas as $pregunta)
        <section class="preguntas">
            <input type="hidden" name="{{$pregunta->id}}">
            <table>
                <thead>
                    <tr>
                        <th>{{$pregunta->pregunta}}.</th>
                        <th>Más(+)</th>
                        <th>Menos(-)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($pregunta->opciones) as $opcion)
                        <tr>
                            <td>{{$opcion}}</td>
                            <td><input type="radio" name="{{$pregunta->id}}[mas]" value="{{$opcion}}"></td>
                            <td><input type="radio" name="{{$pregunta->id}}[menos]" value="{{$opcion}}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endforeach
</article>