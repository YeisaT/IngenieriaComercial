<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfraestructuraSeeder extends Seeder
{
    public function run(): void
    {
        // Limpia antes de insertar para evitar duplicados al re-ejecutar seeders
        DB::table('espacios')->truncate();
        DB::table('unidades')->truncate();

        $espacios = [
            ['icono' => 'fa-chalkboard-user',  'titulo' => 'Aulas Equipadas',     'cuerpo' => '24 aulas con mobiliario ergonómico, proyectores, pantallas y sistemas de sonido. Capacidad para 50 y 80 estudiantes.',                                    'orden' => 1],
            ['icono' => 'fa-desktop',          'titulo' => 'Salas de Cómputo',    'cuerpo' => 'Sala N°1 (28 personas) y Sala N°2 (50 personas) en el 3er piso, con equipos actualizados, Internet y aire acondicionado.',                                 'orden' => 2],
            ['icono' => 'fa-book-open',        'titulo' => 'Sala de Lectura',     'cuerpo' => 'Ubicada en el 2do piso, diseñada para el estudio individual y grupal en un ambiente tranquilo con buena iluminación natural.',                              'orden' => 3],
            ['icono' => 'fa-tv',               'titulo' => 'Sala SEPEG',          'cuerpo' => 'Sala tecnológica en el 1er piso con pantalla interactiva táctil de última generación, orientada a la preparación para el Examen de Grado.',                'orden' => 4],
            ['icono' => 'fa-microphone-lines', 'titulo' => 'Auditorio',           'cuerpo' => '4to piso, con sistema de audio y proyección, butacas confortables, ambiente climatizado y capacidad para eventos de mediana escala.',                      'orden' => 5],
            ['icono' => 'fa-door-open',        'titulo' => 'Dirección de Carrera','cuerpo' => 'En planta baja, coordina y supervisa las actividades académicas y administrativas, garantizando calidad y cumplimiento normativo.',                         'orden' => 6],
        ];

        $unidades = [
            ['titulo' => 'Secretaría de Carrera',               'cuerpo' => 'Atención y apoyo administrativo: horarios, inscripciones, certificados y orientación sobre trámites académicos.',                'orden' => 1],
            ['titulo' => 'Comunicación y Difusión',             'cuerpo' => 'Difusión de normativas, información académica y promoción de eventos culturales y académicos.',                                   'orden' => 2],
            ['titulo' => 'Unidad de Programación',              'cuerpo' => 'Diseño e implementación de mecanismos informáticos para automatizar procedimientos técnicos y administrativos.',                  'orden' => 3],
            ['titulo' => 'Gestión Administrativa y Financiera', 'cuerpo' => 'Coordinación de recursos financieros, materiales, humanos y de servicios generales de la carrera.',                              'orden' => 4],
            ['titulo' => 'Seguimiento Curricular',              'cuerpo' => 'Organización y funcionamiento de la docencia, estructura curricular y desarrollo académico.',                                     'orden' => 5],
            ['titulo' => 'Gabinete Psicopedagógico',            'cuerpo' => 'Apoyo emocional y vocacional a los estudiantes, facilitando el proceso enseñanza-aprendizaje.',                                  'orden' => 6],
            ['titulo' => 'Unidad de Graduación',                'cuerpo' => 'Coordinación de modalidades de graduación, seguimiento y evaluación permanente de actividades de titulación.',                   'orden' => 7],
            ['titulo' => 'Centro de Integración Curricular',    'cuerpo' => 'Articula y consolida los conocimientos adquiridos a lo largo de la carrera antes del egreso.',                                   'orden' => 8],
            ['titulo' => 'Investigación y Extensión',           'cuerpo' => 'Impulsa proyectos de investigación y extensión para promover la competitividad del sector productivo.',                          'orden' => 9],
        ];

        foreach ($espacios as $e) {
            DB::table('espacios')->insert(array_merge($e, ['created_at' => now(), 'updated_at' => now()]));
        }
        foreach ($unidades as $u) {
            DB::table('unidades')->insert(array_merge($u, ['created_at' => now(), 'updated_at' => now()]));
        }    }
}
