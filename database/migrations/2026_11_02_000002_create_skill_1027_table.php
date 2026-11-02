<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Skill_1027', function (Blueprint $table) {
            $table->increments('skill_id');
            $table->string('nama', 100);
            $table->unsignedTinyInteger('level')->default(50); // 0-100
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Skill_1027');
    }
};
