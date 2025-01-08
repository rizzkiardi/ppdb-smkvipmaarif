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
        Schema::create('daftar_ulang', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('calon_siswa_id');
            // $table->string('nama');
            $table->foreignId('calon_siswa_id')->constrained('calon_siswa');
            $table->string('bukti_pembayaran');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_ulang');
    }
};
