<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_siswa', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Diproses', 'Diterima', 'Ditolak'])->default('Diproses')->nullable();
            $table->foreignId('calon_siswa_id')->constrained('calon_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_siswa');
    }
};
