<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->timestamp('publicar_desde')->nullable()->after('activo');
            $table->timestamp('publicar_hasta')->nullable()->after('publicar_desde');
        });
    }

    public function down(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->dropColumn(['publicar_desde', 'publicar_hasta']);
        });
    }
};
