<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Pendidikan_1027', function (Blueprint $table) {
            $table->increments('pendidikan_id');
            $table->string('institusi', 150);
            $table->string('jurusan', 150);
            $table->year('tahun_masuk');
            $table->year('tahun_lulus')->nullable(); // kosong = masih berjalan
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Pendidikan_1027');
    }
};
