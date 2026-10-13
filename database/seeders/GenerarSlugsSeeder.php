<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Noticia;

class GenerarSlugsSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Noticia::all() as $noticia) {
            if (empty($noticia->slug)) {
                $noticia->slug = Str::slug($noticia->titulo);
                $noticia->saveQuietly();
            }
        }
        $this->command->info('Slugs generados: ' . Noticia::whereNotNull('slug')->count());
    }
}
