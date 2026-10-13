<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedesSocialesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('redes_sociales')->truncate();
        $redes = [
            ['icono' => 'fa-brands fa-facebook',  'url' => 'https://www.facebook.com',  'label' => 'Ingeniería Comercial FCEE', 'tipo' => 'institucional', 'orden' => 1],
            ['icono' => 'fa-brands fa-instagram', 'url' => 'https://www.instagram.com', 'label' => 'ing_comercial_fcee',        'tipo' => 'institucional', 'orden' => 2],
            ['icono' => 'fa-brands fa-tiktok',    'url' => 'https://www.tiktok.com',    'label' => 'comunicacion_ingco',        'tipo' => 'institucional', 'orden' => 3],
            ['icono' => 'fa-brands fa-facebook',  'url' => 'https://www.facebook.com/share/1CX18nYgDT/',                                                        'label' => 'Facebook',   'tipo' => 'inmerco', 'orden' => 1],
            ['icono' => 'fa-brands fa-instagram', 'url' => 'https://www.instagram.com/inmerco_investigaciones?igsh=MXRrMXpkcGlqZW8yYw==',                           'label' => 'Instagram',  'tipo' => 'inmerco', 'orden' => 2],
            ['icono' => 'fa-brands fa-tiktok',    'url' => 'https://www.tiktok.com/@inmercobolivia?_t=ZM-8xXae42fNgb&_r=1',                                         'label' => 'TikTok',     'tipo' => 'inmerco', 'orden' => 3],
            ['icono' => 'fa-brands fa-linkedin',  'url' => 'https://www.linkedin.com/company/inmerco-investigaciones-de-mercado/',                                   'label' => 'LinkedIn',   'tipo' => 'inmerco', 'orden' => 4],
        ];

        foreach ($redes as $r) {
            DB::table('redes_sociales')->insert(array_merge($r, ['created_at' => now(), 'updated_at' => now()]));
        }
    }
}
