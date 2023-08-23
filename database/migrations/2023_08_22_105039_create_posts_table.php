<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable()->default(NULL);
            $table->string('autor')->nullable()->default(NULL);
            $table->string('tipo')->nullable()->default(NULL);
            $table->string('tags')->nullable()->default(NULL);
            $table->string('categorias')->nullable()->default(NULL);
            $table->string('conteudo')->nullable()->default(NULL);
            $table->string('imagePost')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
