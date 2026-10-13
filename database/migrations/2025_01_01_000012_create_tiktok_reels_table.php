<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tiktok_reels', function (Blueprint $table) {
            $table->id();
            $table->string('imagen_url');
            $table->string('titulo')->nullable();
            $table->string('vistas')->nullable();
            $table->string('link');
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tiktok_reels');
    }
};
