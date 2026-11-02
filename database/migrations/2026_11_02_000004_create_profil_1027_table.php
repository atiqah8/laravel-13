<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Profil_1027', function (Blueprint $table) {
            $table->increments('profil_id');
            $table->string('nama', 150);
            $table->string('peran', 150);
            $table->text('tentang')->nullable();
            $table->string('email')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Profil_1027');
    }
};
