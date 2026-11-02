<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Portofolio_1027', function (Blueprint $table) {
            $table->increments('portofolio_id');
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->string('teknologi', 150)->nullable();
            $table->year('tahun');
            $table->string('link')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Portofolio_1027');
    }
};
