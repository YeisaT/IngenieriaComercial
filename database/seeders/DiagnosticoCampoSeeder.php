<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiagnosticoCampoSeeder extends Seeder
{
    public function run(): void
    {
        $rows = DB::table('campo_laboral')->orderBy('orden')->get();
        foreach ($rows as $r) {
            $hex = bin2hex($r->icono);
            $len = strlen($r->icono);
            $this->command->line("orden={$r->orden} len={$len} hex={$hex} valor=[{$r->icono}]");
        }
    }
}
