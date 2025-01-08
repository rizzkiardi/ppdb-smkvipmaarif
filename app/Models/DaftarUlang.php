<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    use HasFactory;

    protected $table = 'daftar_ulang';
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }


}
