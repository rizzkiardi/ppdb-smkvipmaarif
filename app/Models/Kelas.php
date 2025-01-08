<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = [];

    // public function siswas()
    // {
    //     return $this->hasMany(CalonSiswa::class, 'kelas_id');
    // }

    public function siswas()
    {
        return $this->hasMany(DaftarUlang::class, 'kelas_id');
    }

    public function daftarUlang()
    {
        return $this->hasMany(DaftarUlang::class);
    }
}
