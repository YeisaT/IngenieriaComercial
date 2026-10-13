<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixCampoLaboralSeeder extends Seeder
{
    public function run(): void
    {
        // Solo iconos disponibles en Font Awesome 6 FREE
        $items = [
            ['orden' => 1, 'icono' => 'fa-sitemap'],       // Gerencia y Liderazgo
            ['orden' => 2, 'icono' => 'fa-chart-line'],    // Marketing y Ventas
            ['orden' => 3, 'icono' => 'fa-chart-bar'],     // Finanzas y Proyectos
            ['orden' => 4, 'icono' => 'fa-users'],         // Recursos Humanos (fa-people-group = Pro)
            ['orden' => 5, 'icono' => 'fa-globe'],         // Comercio Exterior (fa-earth-americas = Pro)
            ['orden' => 6, 'icono' => 'fa-lightbulb'],     // Consultoría Independiente
        ];

        foreach ($items as $item) {
            DB::table('campo_laboral')
                ->where('orden', $item['orden'])
                ->update(['icono' => $item['icono']]);
        }

        $rows = DB::table('campo_laboral')->orderBy('orden')->get(['titulo', 'icono']);
        foreach ($rows as $r) {
            $this->command->line("  {$r->titulo} => {$r->icono}");
        }
    }
}
