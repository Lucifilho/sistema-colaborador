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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('Ramal')->nullable()->default(NULL);
            $table->string('Nome')->nullable()->default(NULL);
            $table->string('Whatsapp')->nullable()->default(NULL);
            $table->string('Departamento')->nullable()->default(NULL);
            $table->string('Unidade')->nullable()->default(NULL);
            $table->string('Skype')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
