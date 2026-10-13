<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            NoticiasSeeder::class,
            GenerarSlugsSeeder::class,
            ValoresSeeder::class,
            TimelineSeeder::class,
            AcreditacionSeeder::class,
            InfraestructuraSeeder::class,
            GraduacionSeeder::class,
            CampoLaboralSeeder::class,
            RedesSocialesSeeder::class,
        ]);
    }
}
