<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusSiswa extends Model
{
    use HasFactory;
    protected $table = 'status_siswa';
    protected $guarded = [];

    // public function calonSiswas(): HasMany
    // {
    //     return $this->HasMany(CalonSiswa::class);
    // }

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'calon_siswa_id');
    }
}
