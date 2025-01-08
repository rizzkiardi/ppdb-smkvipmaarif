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
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('nik');
            $table->string('sekolah_asal');
            $table->enum('kartu_pip', ['Ya', 'Tidak']);
            $table->enum('jurusan', ['Akuntansi', 'Desain Komunikasi Visual', 'Ototronik']);
            
            $table->enum('j_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('nisn');
            $table->integer('tahun_lulus');
            $table->string('no_hp');
            $table->string('alamat');
            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onDelete('cascade');

            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('user_id')->constrained('users')->nullable();

            // $table->foreignId('user_id')->constrained(
            //     table: 'users',
            //     indexName: 'calon_siswa_user_id'
            // );
            // $table->foreignId('status_siswa_id')->constrained(
            //     table: 'status_siswa',
            //     indexName: 'calon_siswa_status_siswa_id'
            // );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa');
    }
};
