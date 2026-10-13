<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValoresSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('valores')->truncate();
        $valores = [
            ['icono' => 'fa-shield-halved',  'label' => 'Responsabilidad y Disciplina',    'orden' => 1],
            ['icono' => 'fa-scale-balanced', 'label' => 'Honestidad y Transparencia',       'orden' => 2],
            ['icono' => 'fa-handshake',      'label' => 'Lealtad y Respeto',                'orden' => 3],
            ['icono' => 'fa-dove',           'label' => 'Equidad y Libertad',               'orden' => 4],
            ['icono' => 'fa-star',           'label' => 'Calidad y Responsabilidad Social', 'orden' => 5],
        ];

        foreach ($valores as $v) {
            DB::table('valores')->insert(array_merge($v, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
