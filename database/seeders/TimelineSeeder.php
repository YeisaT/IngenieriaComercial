<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('timeline')->truncate();
        $items = [
            ['anio' => '1992',        'titulo' => 'Fundación de la Carrera',  'cuerpo' => 'La Carrera de Ingeniería Comercial nació oficialmente el 30 de abril de 1992, con tan solo 54 estudiantes pioneros, marcando el inicio de un proyecto académico visionario.',                                                                                                                                                                                'orden' => 1],
            ['anio' => 'Crecimiento', 'titulo' => 'Expansión Académica',      'cuerpo' => 'A lo largo de los años, la carrera experimentó un crecimiento sostenido, reflejo del compromiso con la excelencia académica y la pertinencia de una formación integral.',                                                                                                                                                                                     'orden' => 2],
            ['anio' => '2025',        'titulo' => 'Más de 3800 Estudiantes',  'cuerpo' => 'En el primer semestre de 2025, la carrera cuenta con más de 3800 estudiantes activos. El proceso de acreditación ante el CEUB consolidó la calidad académica de la carrera.',                                                                                                                                                                                 'orden' => 3],
        ];

        foreach ($items as $item) {
            DB::table('timeline')->insert(array_merge($item, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
