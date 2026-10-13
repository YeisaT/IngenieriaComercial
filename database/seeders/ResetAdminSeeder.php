<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetAdminSeeder extends Seeder
{
    public function run(): void
    {
        $exists = DB::table('users')->where('email', 'admin@ingco.edu.bo')->first();

        if ($exists) {
            DB::table('users')->where('email', 'admin@ingco.edu.bo')->update([
                'password' => Hash::make('Admin@2025!'),
                'role'     => 'admin',
            ]);
            $this->command->info('Contraseña del admin reseteada.');
        } else {
            DB::table('users')->insert([
                'name'       => 'Administrador',
                'email'      => 'admin@ingco.edu.bo',
                'role'       => 'admin',
                'password'   => Hash::make('Admin@2025!'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $this->command->info('Admin creado.');
        }

        // Muestra el usuario para confirmar
        $u = DB::table('users')->where('email', 'admin@ingco.edu.bo')->first();
        $this->command->line("ID: {$u->id} | Email: {$u->email} | Role: {$u->role}");
    }
}
