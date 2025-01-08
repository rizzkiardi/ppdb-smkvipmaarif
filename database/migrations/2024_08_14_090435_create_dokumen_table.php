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
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('pas_foto');
            $table->string('skl');
            $table->string('ijazah')->nullable(); // Ijazah boleh kosong
            $table->string('kk');
            $table->string('akte');
            // $table->foreignId('calon_siswa_id')->constrained(
            //     table: 'calon_siswa',
            //     indexName: 'dokumen_calon_siswa_id'
            // );

            // $table->foreignId('calon_siswa_id')->constrained('calon_siswa');

            $table->foreignId('calon_siswa_id')->constrained('calon_siswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
