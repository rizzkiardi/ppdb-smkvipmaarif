<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orangtua';
    protected $guarded = [];

    // Relasi inverse one-to-one dengan tabel calon_siswa
    public function calonSiswa()
    {
        // return $this->belongsTo(CalonSiswa::class, 'calon_siswa_id');
        return $this->belongsTo(CalonSiswa::class);

    }
}
