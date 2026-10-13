<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcreditacionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('acreditacion_items')->truncate();
        $items = [
            ['icono' => 'fa-file-lines', 'titulo' => 'Revisión Documental',          'cuerpo' => 'Planes de estudio, programas de materias, normativas internas, evidencias de evaluación docente y seguimiento a egresados.',                          'orden' => 1],
            ['icono' => 'fa-building',   'titulo' => 'Inspección de Infraestructura', 'cuerpo' => 'Recorrido por las 24 aulas, 2 salas de cómputo, sala de lectura, dirección de carrera, sala SEPEG y espacios comunes.',                               'orden' => 2],
            ['icono' => 'fa-users',      'titulo' => 'Entrevistas con Actores Clave', 'cuerpo' => 'Reuniones con docentes, estudiantes, administrativos, egresados y empleadores para conocer experiencias y sugerencias.',                               'orden' => 3],
            ['icono' => 'fa-laptop',     'titulo' => 'Evaluación de Servicios',       'cuerpo' => 'Gestión académica, uso de tecnologías, mecanismos de tutoría y vinculación con el entorno productivo y empresarial.',                                  'orden' => 4],
        ];

        foreach ($items as $item) {
            DB::table('acreditacion_items')->insert(array_merge($item, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
