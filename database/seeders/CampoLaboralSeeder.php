<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampoLaboralSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('campo_laboral')->truncate();

        $items = [
            ['icono' => 'fa-sitemap',    'titulo' => 'Gerencia y Liderazgo',     'descripcion' => 'Gestión de empresas y toma de decisiones estratégicas en organizaciones públicas y privadas.',          'orden' => 1],
            ['icono' => 'fa-chart-line', 'titulo' => 'Marketing y Ventas',        'descripcion' => 'Creación de estrategias de mercado, posicionamiento de marca y análisis del consumidor.',               'orden' => 2],
            ['icono' => 'fa-chart-bar',  'titulo' => 'Finanzas y Proyectos',      'descripcion' => 'Análisis de rentabilidad, evaluación de proyectos de inversión y gestión financiera.',                  'orden' => 3],
            ['icono' => 'fa-users',      'titulo' => 'Recursos Humanos',          'descripcion' => 'Gestión del talento humano, cultura organizacional y desarrollo del capital humano.',                   'orden' => 4],
            ['icono' => 'fa-globe',      'titulo' => 'Comercio Exterior',         'descripcion' => 'Operaciones internacionales, logística global y gestión de negocios en mercados externos.',             'orden' => 5],
            ['icono' => 'fa-lightbulb',  'titulo' => 'Consultoría Independiente', 'descripcion' => 'Asesoramiento estratégico a emprendimientos, pymes y corporaciones del sector productivo.',            'orden' => 6],
        ];

        foreach ($items as $item) {
            DB::table('campo_laboral')->insert(array_merge($item, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
