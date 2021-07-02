<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DesempenioLaboral;

class DesempenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DesempenioLaboral::factory()->count(13)->create();
        DB::table('desempenio_laboral')->insert([
            [
                'pregunta'=>'Enunciado 1',
                'opcion_1'=> 'Su forma de comunicarse es permanente, clara y objetiva, en ambos sentidos con todos.',
                'opcion_2'=> 'Se comunica permanentemente, de forma clara y objetiva, en ambos sentidos pero NO con todos.',
                'opcion_3'=> 'Se comunica cuando lo necesita, de forma clara y objetiva, aunque casi no escucha.',
                'opcion_4'=> 'Se comunica muy poco, de forma clara y objetiva, además no escucha.',
                'opcion_5'=> 'Comunicación practicamente nula y es difícil de entender, además de no escuchar.'
            ],
            [
                'pregunta' => 'Enunciado 2',
                'opcion_1' => 'Ha logrado GRAN influencia en su equipo, la gente con él sabe a donde va, y como hacerlo. Tiene gran seguridad.',
                'opcion_2' => 'Ha logrado cierta influencia en su equipo, la gente con él sabe a donde va, y como hacerlo. Tiene seguridad.',
                'opcion_3' => 'Tiene el respeto de la mayoría. Cuando le ha tocado ha sabido dirigir sin problemas y sienten confianza hacia él, más no plena seguridad.',
                'opcion_4' => 'Poca gente le tiene confianza, Cuando le ha tocado no ha sabido dirigir con seguridad, hay dudas de lo que quiere.',
                'opcion_5' => 'Nula confianza y seguridad hacia él por parte del equipo, graves deficiencias cuando le ha tocado dirigir.'
            ],
            [
                'pregunta' => 'Enunciado 3',
                'opcion_1' => 'Su forma de ser y de comunicarse mantienen permanentemente motivado a todo el equipo de trabajo.',
                'opcion_2' => 'Ha sabido mantener elevada y constante la motivación del equipo, pero en ocasiones no en todas.',
                'opcion_3' => 'Ha sabido motivar al equipo, aunque no es en todos y no siempre.',
                'opcion_4' => 'Poca gente esta motivada con él y de vez en cuando, hay pasividad y actitud negativa en el equipo.',
                'opcion_5' => 'Él y su equipo de trabajo se ve sumamente desmotivado hacia su trabajo.'
            ],
            [
                'pregunta' => 'Enunciado 4',
                'opcion_1' => 'Sobresaliente apego a normas y procedimientos de seguridad, orden y limpieza. Lleva record sin accidentes.',
                'opcion_2' => 'Limpieza y orden en su area de trabajo, sin embargo en seguridad puede mejorar. Buen record sin accidentes.',
                'opcion_3' => 'La inconsistencia en seguridad, orden y limpieza han povocado de vez en cuando problemas y accidentes, aunque muy leves.',
                'opcion_4' => 'Hay deficiencias notables en limpieza, orden y seguridad, lo que ha llevado a que se den accidentes serios.',
                'opcion_5' => 'La falta de Seguridad, orden y limpieza da muy mala imagen de su area de trabajo. Ha habido constantes y serios accidentes.'
            ],
            [
                'pregunta' => 'Enunciado 5',
                'opcion_1' => 'Excelente capacitación y adiestramiento, siempre se anticipa, inclusive a necesidades futuras.',
                'opcion_2' => 'Buen nivel de capacitación y adiestramiento, aunque en ocasiones falta hacerlo mejor y más frecuentemente.',
                'opcion_3' => 'Le falta un poco de capacitación y adiestramiento, sobre todo en algunas procedimientos específicos.',
                'opcion_4' => 'Parece que muy pocos se preocupa por capacitarse y adiestrarse..',
                'opcion_5' => 'Hay deficiencias serias en su capacitación y adiestramiento.'
            ],
            [
                'pregunta' => 'Enunciado 6',
                'opcion_1' => 'En él se aprecia una actitud excepcional y permanente de colaboración y de servicio.',
                'opcion_2' => 'En él se ve buena actitud y colaboración todos los días.',
                'opcion_3' => 'Hay buena colaboración y actitud de servicio en él, aunque no se ve diario así.',
                'opcion_4' => 'En ocasiones se aprecia en él falta de colaboración.',
                'opcion_5' => 'En él se ven deficiencias notables y permanentes en cuanto a colaboración y actitud de servicio.'
            ],
            [
                'pregunta' => 'Enunciado 7',
                'opcion_1' => 'Encuentra soluciones efectivas y de forma oportuna a todas y diversas situaciones que se le presentan.',
                'opcion_2' => 'Da soluciones adecuadas y en tiempo a las situaciones y problemas que se le presentan.',
                'opcion_3' => 'Aporta soluciones adecuadas, aunque en ocasiones un poco lento a los problemas que se presentan.',
                'opcion_4' => 'Ha tomado algunas decisiones equivocadas y en destiempo a los problemas y situaciones que se presentan.',
                'opcion_5' => 'La mayoría de sus decisiones dejan mucho que desear y generalmente cuando ya es tarde.'
            ],
            [
                'pregunta' => 'Enunciado 8',
                'opcion_1' => 'En todo el equipo, incluyendolo a él, se aprecia un ambiente de trabajo extraordinario y es así permanentemente.',
                'opcion_2' => 'Hay buen ambiente de trabajo, incluyendolo a él, y es constante. todo el equipo parece estar contento.',
                'opcion_3' => 'Todo el equipo, incluyéndolo a él, trabaja a gusto en un ambiente tranquilo, seguro y confiable.',
                'opcion_4' => 'En todo el equipo, incluyendolo a él, se aprecian diversas situaciones que han provocado mal ambiente de trabajo.',
                'opcion_5' => 'En todo el equipo, incluyendolo a él, el ambiente de trabajo es deplorable, se nota molestia y conflictos constantes.'
            ],
            [
                'pregunta' => 'Enunciado 9',
                'opcion_1' => 'Siempre ha demostrado conocimientos, habilidades y experiencia sorprendentes y excepcionales.',
                'opcion_2' => 'Su capacidad, experiencia y habilidad personal, nunca han dejado lugar a dudas. Es bueno en general.',
                'opcion_3' => 'En alguna ocasión ha demostrado ciertas deficiencias en su capacidad, aunque no es muy notable.',
                'opcion_4' => 'Ha habido varias ocasiones en que su falta de conocimientos, habilidad o experiencia le ha provocado problemas.',
                'opcion_5' => 'Denota grandes deficiencias personales para llevar a cabo su trabajo.'
            ],
            [
                'pregunta' => 'Enunciado 10',
                'opcion_1' => 'El evaluado y su departamento demuestran actitud y resultados excepcionales en reduccón de costos y productividad.',
                'opcion_2' => 'Hay buena conciencia del costo y productividad, además de hechos importantes que así lo demuestran.',
                'opcion_3' => 'Falta ser más constantes en su esfuerzo por mejorar la productividad y reducir costos.',
                'opcion_4' => 'Deficiencias notorias en el aprovechamiento de los recursos de su area, generando costos y baja productividad.',
                'opcion_5' => 'Total falta de administración y aprovechamiento de recursos, provocando elevados costos y la más baja productividad.'
            ],

            [
                'pregunta'=>'¿Que fortalezas profesionales reconoce en el evaluado?',
                'opcion_1' => '',
                'opcion_2' => '',
                'opcion_3' => '',
                'opcion_4' => '',
                'opcion_5' => ''
            ],
            ['pregunta'=>'¿Qué aspectos considera que el evaluado debe mejorar para optimizar su desempeño?',
                'opcion_1' => '',
                'opcion_2' => '',
                'opcion_3' => '',
                'opcion_4' => '',
                'opcion_5' => ''
            ],
            [
                'pregunta'=>'¿Qué sugerencia le darías a la organización para ayudar al evaluado a ser un mejor profesional de lo que ya es?',
                'opcion_1' => '',
                'opcion_2' => '',
                'opcion_3' => '',
                'opcion_4' => '',
                'opcion_5' => ''
            ],
        ]);
    }
}
