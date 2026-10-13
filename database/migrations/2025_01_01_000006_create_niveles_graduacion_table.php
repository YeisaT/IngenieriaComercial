<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('niveles_graduacion', function (Blueprint $table) {
            $table->id();
            $table->string('icono');
            $table->string('titulo');
            $table->string('requisito');
            $table->json('modalidades');
            $table->text('titulo_otorgado')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('niveles_graduacion');
    }
};
