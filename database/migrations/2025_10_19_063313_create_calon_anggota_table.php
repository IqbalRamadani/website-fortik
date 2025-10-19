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
        Schema::create('calon_anggota', function (Blueprint $table) {
            $table->string('nim', 10)->primary();
            $table->string('nama_lengkap');
            $table->string('divisi')->nullable();
            $table->enum('status', ['LULUS', 'TIDAK_LULUS']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_anggota');
    }
};
