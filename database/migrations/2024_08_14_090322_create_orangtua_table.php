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
        Schema::create('orangtua', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('t_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('agama_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('no_hp_ayah');
            $table->text('alamat_ayah');

            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('t_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('agama_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('no_hp_ibu');
            $table->text('alamat_ibu');
            // $table->foreignId('calon_siswa_id')->constrained(
            //     table: 'calon_siswa',
            //     indexName: 'orangtua_calon_siswa_id'
            // );

            // $table->foreignId('calon_siswa_id')->constrained('calon_siswa')->nullable();
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
        Schema::dropIfExists('orangtua');
    }
};
