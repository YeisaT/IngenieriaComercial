<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoticiasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('noticias')->truncate();
        $noticias = [
            ['titulo' => 'Acreditación con Excelencia: 98.07 puntos',          'descripcion' => 'La carrera obtuvo la máxima calificación en el proceso de acreditación ante el CEUB.',                                                          'imagen_url' => 'https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=1200&q=80', 'href' => '#acreditacion', 'fecha' => 'Mayo 2025',     'orden' => 1],
            ['titulo' => 'Más de 3800 estudiantes activos en 2025',             'descripcion' => 'La comunidad de Ingeniería Comercial sigue creciendo desde sus 54 pioneros en 1992.',                                                             'imagen_url' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80', 'href' => '#historia',     'fecha' => 'Enero 2025',    'orden' => 2],
            ['titulo' => 'INMERCO: empresa junior líder en investigación',      'descripcion' => 'Nuestra empresa junior brinda investigaciones de mercado y consultorías en Santa Cruz.',                                                           'imagen_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&q=80',    'href' => '#contacto',     'fecha' => 'Abril 2025',    'orden' => 3],
            ['titulo' => 'Nueva Sala Tecnológica SEPEG inaugurada',             'descripcion' => 'El módulo 264 estrena sala con pantalla interactiva táctil de última generación.',                                                                 'imagen_url' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1200&q=80', 'href' => '#infraestructura','fecha' => 'Marzo 2025',   'orden' => 4],
            ['titulo' => 'Proceso de graduación: conoce todas las modalidades', 'descripcion' => 'Desde Técnico Universitario hasta Licenciatura, múltiples vías de titulación disponibles.',                                                       'imagen_url' => 'https://images.unsplash.com/photo-1627556704302-624286467c65?w=1200&q=80', 'href' => '#graduacion',   'fecha' => 'Febrero 2025',  'orden' => 5],
        ];

        foreach ($noticias as $n) {
            DB::table('noticias')->insert(array_merge($n, [
                'slug' => Str::slug($n['titulo']),
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
