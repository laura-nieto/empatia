<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClimaLaboral;

class ClimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clima_laboral')->insert([
            ['pregunta' => 'Mi jefe esta disponible cuando se le necesita.'],
            ['pregunta' => 'Los tramites que se utilizan en la empresa son simples y facilitan la atención.'],
            ['pregunta' => 'En la empresa las decisiones se toman en el nivel en el que deben tomarse.'],
            ['pregunta' => 'Considero que el trabajo que realiza mi jefe inmediato para manejar conflictos es bueno.'],
            ['pregunta' => 'Existe una buena comunicación entre mis compañeros de trabajo.'],
            ['pregunta' => 'Mis compañeros de trabajo toman iniciativas para la solución de problemas.'],
            ['pregunta' => 'Mi jefe inmediato se preocupa por crear un ambiente laboral agradable'],
            ['pregunta' => 'Las normas y reglas de la empresa son claras y facilitan mi trabajo.'],
            ['pregunta' => 'Los esfuerzos de los jefes se encaminan al logro de los objetivos de la empresa.'],
            ['pregunta' => 'Me interesa el desarrollo de la empresa.'],
            
            ['pregunta' => 'Estoy comprometido con la empresa.'],
            ['pregunta' => 'Mi jefe inmediato me comunica si estoy realizando bien o mal mi trabajo'],
            ['pregunta' => 'Mi trabajo contribuye directamente al alcance de los objetivos de la empresa.'],
            ['pregunta' => 'Mi jefe inmediato se reune regularmente con los trabajadores para coordinar aspectos generales del trabajo.'],
            ['pregunta' => 'Existe sana competencia entre mis compañeros.'],
            ['pregunta' => 'Considero que los beneficios que me ofrecen en mi trabajo son los adecuados.'],
            ['pregunta' => 'Se han realizado actividades recreativas en los últimos seis meses.'],
            ['pregunta' => 'Recibo mi pago a tiempo.'],
            ['pregunta' => 'La limpieza de los ambientes es adecuada.'],
            ['pregunta' => 'Existen incentivos laborales para que yo trate de hacer mejor mi trabajo.'],

            ['pregunta' => 'Mantengo buenas relaciones con los miembros de mi grupo de trabajo.'],
            ['pregunta' => 'Se me permite ser creativo e innovador en las soluciones de los problemas laborales.'],
            ['pregunta' => 'Me siento a gusto de formar parte de la organización.'],
            ['pregunta' => 'La empresa  se encuentra organizada para preveer los problemas que se presenten.'],
            ['pregunta' => 'El jefe supervisa constantemente al personal.'],
            ['pregunta' => 'Existen formas o métodos para evaluar la calidad de atención en la empresa.'],
            ['pregunta' => 'Conozco las tareas o funciones especificas que debo realizar en la empresa.'],
            ['pregunta' => 'Recibo buen trato en la empresa.'],
            ['pregunta' => 'Nuestros directivos contribuyen a crear condiciones adecuadas para el progreso de la empresa.'],
            ['pregunta' => 'En la empresa participó en la toma de decisiones'],
            
            ['pregunta' => 'Mi contribución juega un papel importante en el éxito de la empresa.'],
            ['pregunta' => 'La información de interés para todos llega de manera oportuna.'],
            ['pregunta' => 'Las reuniones de coordinación con los miembros de otras áreas son frecuentes.'],
            ['pregunta' => 'Presto atención a los comunicados que emiten mis jefes.'],
            ['pregunta' => 'En mi equipo de trabajo, puedo expresar mi punto de vista, aún cuando contradiga al del los demás miembros.'],
            ['pregunta' => 'En la empresa, reconocen habitualmente la buena labor realizada.'],
            ['pregunta' => 'Existe equidad en la remuneraciones.'],
            ['pregunta' => 'Existe un ambiente organizado en mi empresa.'],
            ['pregunta' => 'Mi trabajo es evaluado en forma adecuada.'],
            ['pregunta' => 'Las otras áreas de la empresa me ayudan cuando lo necesito'],
            
            ['pregunta' => 'Los premios y reconocimientos son distribuidos en forma justa.'],
            ['pregunta' => 'En términos generales, me siento satisfecho con mi ambiente de trabajo.'],
            ['pregunta' => 'Puedo contar con mis compañeros de trabajo cuando los necesito.'],
            ['pregunta' => 'La innovación es característica de nuestra empresa.'],
            ['pregunta' => 'Mi jefe inmediato trata de obtener información antes de tomar una decisión.'],
            ['pregunta' => 'Mi jefe inmediato apoya mis esfuerzos. '],
            ['pregunta' => 'El trabajo que realizo permite que desarrolle al máximo todas mis capacidades.'],
            ['pregunta' => 'Las tareas que desempeño corresponden a mi funcion.'],
            ['pregunta' => 'El Trabajo que realizo es valorado por mi jefe inmediato.'],
            ['pregunta' => 'Es fácil para mis compañeros de trabajo que sus nuevas ideas sean consideradas.'],
            
            ['pregunta' => 'Considero que la distribución física de mi área me permite trabajar cómodamente y eficientemente.'],
            ['pregunta' => 'Mi institución es flexible y se adapta bien a los cambios.'],
            ['pregunta' => 'Mi salario y beneficios son razonables.'],
            ['pregunta' => 'Mi remuneración es adecuada en relación con el trabajo que realizo.'],
            ['pregunta' => 'El sueldo que percibo satisface mis necesidades basicas.'],
            
            ['pregunta' => 'De la empresa de la cual forma parte, ¿Qué es lo que más le enorgullece?. Aquello que compartiría con externos por ser algo que lo identifica y hace sentir satisfecho.'],
            ['pregunta' => '¿Que recomendación daría para mejorar el clima laboral de la organización?. Favor especifique con ejemplos.'],
        ]);
    }
}
