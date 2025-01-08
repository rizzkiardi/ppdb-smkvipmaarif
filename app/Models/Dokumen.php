<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';
    protected $guarded = [];

    // Relasi inverse one-to-many dengan tabel calon_siswa
    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
