<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraduacionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('niveles_graduacion')->truncate();
        $niveles = [
            [
                'icono'          => 'fa-graduation-cap',
                'titulo'         => 'Técnico Universitario Superior',
                'requisito'      => 'Hasta el 6to semestre · 35 asignaturas · Materia GRT-001 o GDIT-001',
                'modalidades'    => json_encode(['Proyecto de Grado Técnico','Tesina','Pasantía','Monografía','Graduación Directa — Reconocimiento a la Calidad']),
                'titulo_otorgado'=> 'Técnico Universitario en Ingeniería Comercial — Analista Administrativo y Financiero / Licenciado en Ingeniería Comercial',
                'orden'          => 1,
            ],
            [
                'icono'          => 'fa-award',
                'titulo'         => 'Licenciatura',
                'requisito'      => 'Hasta el 10mo semestre · 55 asignaturas · Materia GRL-001',
                'modalidades'    => json_encode(['Tesis de Grado','Proyecto de Grado','Trabajo Dirigido','Examen de Grado','Modalidad Diplomado','Modalidad SEPEG']),
                'titulo_otorgado'=> null,
                'orden'          => 2,
            ],
            [
                'icono'          => 'fa-trophy',
                'titulo'         => 'Graduación Directa',
                'requisito'      => 'Del 9no al 14vo semestre · 55 asignaturas · Materia GDI-001',
                'modalidades'    => json_encode(['Graduación por Excelencia Académica','Graduación por Buen Rendimiento Académico','Graduación por Buen Desempeño Académico']),
                'titulo_otorgado'=> null,
                'orden'          => 3,
            ],
        ];

        foreach ($niveles as $n) {
            DB::table('niveles_graduacion')->insert(array_merge($n, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
