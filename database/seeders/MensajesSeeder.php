<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mensaje;


class MensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensajes')->insert([
            [
                'tipo'=>'desempeño laboral',
                'mensaje' =>'<h4><strong>Encuesta de Desempeño 360º</strong></h4><p><br>&nbsp;</p><p>Le damos la bienvenida y agradecemos su colaboración en este proceso.</p><p>A continuación tendrá que desarrollar una serie de encuestas diseñadas para conocer el desempeño profesional propio y de los demás colaboradores de la organización que le sean designados.</p><p>Para el desarrollo de las encuestas no tenemos límite de tiempo, sin embargo, le aconsejamos que se organice de tal forma que una vez empezado el llenado de una de ellas la termine completamente ya que las respuestas de esa encuesta no se guardarán (teniendo que llenar dicha encuesta nuevamente desde el inicio).</p><p>Le aconsejamos leer con detenimiento las instrucciones de llenado y cada una de las preguntas, asimismo solicitarle absoluta imparcialidad y objetividad al momento de ponderar el desempeño del evaluado. Finalmente, le aconsejamos ubicar una locación con buena recepción de internet.</p><p><strong>¡Éxitos!</strong></p><p><br>&nbsp;</p>'
            ],
            [
                'tipo' => 'desempeño laboral',
                'mensaje' => '<p>Le solicitamos, puntúe a sus compañeros con la mayor objetividad posible, siendo el criterio prioritario a considerar el desempeño profesional y los resultados del mismo en beneficio del área de trabajo y la organización.</p><p>&nbsp;</p><p>Recalcamos que en esta encuesta no hay respuestas correctas ni incorrectas, y para tener un alcance global de su respuesta le invitamos a compartir con nosotros las fortalezas, aspectos de mejora y recomendaciones que favorezcan el desempeño del evaluado.</p><p><br>&nbsp;</p>'
            ],
            [
                'tipo' => 'desempeño laboral',
                'mensaje' => '<p>La escala de respuesta tiene 05 alternativas, las mismas que se van incrementando en intensidad a medida que el número es mayor. En ese sentido, elija la alternativa que exprese de forma mas precisa su apreciación.</p><p>&nbsp;</p><ol><li>No satisfecho</li><li>Poco satisfecho</li><li>Moderadamente satisfecho</li><li>Muy satisfecho</li><li>Extremadamente satisfecho</li></ol><p>&nbsp;</p><p>Habiendo desarrollado las 10 enunciados iniciales. Le invitamos comparta sus opiniones respondiendo las 03 preguntas finales (opcional).</p><p><br>&nbsp;</p>'
            ],
            [
                'tipo' => 'clima laboral',
                'mensaje'=>'<h4><strong>Encuesta de Clima Laboral&nbsp;</strong></><p><strong>Confidencialidad y anonimato de la encuesta</strong></p><p>Desde Empatía Consultores SAC, nos hacemos responsables de garantizar a todos aquellos colaboradores que participen en esta encuesta la absoluta confidencialidad y anonimato de las opiniones vertidas en la misma.</p><p>En ese sentido,&nbsp;</p><ul><li>Nos aseguramos del resguardo de la información del 100% de los participantes de la empresa o de la muestra representativa que los responsables designen.</li><li>En coordinación con los responsables de la organización promovemos un escenario libre de presiones e influencias que intervengan en el libre llenado de las encuestas.</li><li>Garantizamos que la empresa únicamente tendrá acceso a los resultados generales de la encuesta, sin el detalle de los nombres u otros datos de carácter individual.<br>&nbsp;</li></ul><p><strong>Recomendaciones de llenado</strong></p><p>La empresa de la cual usted forma parte considera importante su opinión y alcances en referencia al Clima Laboral, es por esto que lo invitamos a leer con mucha atención e interés las recomendaciones que a continuación le compartimos.</p><ul><li>Sea sincero y completamente honesto para que los resultados generales se alineen con la realidad de la organización.</li><li>Comparta tanto las fortalezas como sus recomendaciones con el objetivo de mejorar el clima laboral de la organización.</li><li>Considere que no hay respuestas correctas ni incorrectas, básicamente quisiéramos que comparta con nosotros su opinión acerca de la empresa.</li><li><strong>Para esta encuesta no hay un límite de tiempo, sin embargo, le aconsejamos que se organice de tal forma que una vez empezado el llenado la termine completamente, ya que las respuestas de esa encuesta no se guardarán (teniendo que llenar dicha encuesta nuevamente desde el inicio). Finalmente, le aconsejamos ubicar una locación con buena recepción de internet.</strong></li></ul><p><br>&nbsp;</p><p>¡Éxitos!</p><p><br>&nbsp;</p>'
            ],
            [
                'tipo' => 'automatizacion',
                'mensaje' => '<p>A continuación tendrá que desarrollar una serie de pruebas diseñadas con la finalidad de evaluar su aptitud laboral y afinidad al perfil de puesto de la organización.</p><p><br>&nbsp;</p><p>Favor calcule su tiempo, con el objetivo de no dejar ninguna prueba sin resolver ni a medio completar (si no culmina la prueba en el límite establecido de tiempo esta se cerrará automáticamente y proseguirá con la siguiente prueba). Asimismo le aconsejamos leer y seguir con detenimiento las instrucciones previas al inicio de cada una de ellas. Considere ubicar una locación con buena recepción de internet y responder con veracidad de acuerdo a las indicaciones que se le vayan dando.</p>'
            ]
        ]);
    }
}
