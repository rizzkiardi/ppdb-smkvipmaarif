<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswa';
    protected $guarded = [];
    protected $dates = ['tgl_lahir'];
    // public function status():BelongsTo
    // {
    //     return $this->belongsTo(CalonSiswa::class);
    // }

    public static function boot()
    {
        parent::boot();

        static::created(function ($calonSiswa) {
            // Menyimpan status default 'Diproses' setelah calon siswa dibuat
            $calonSiswa->statusSiswa()->create([
                'status' => 'Diproses',
            ]);
        });
    }

    // Relasi many-to-one dengan tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-one dengan tabel orangtua
    public function orangtua()
    {
        return $this->hasOne(Orangtua::class);
    }

    // Relasi one-to-many dengan tabel dokumen
    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function statusSiswa()
    {
        return $this->hasOne(StatusSiswa::class, 'calon_siswa_id');
    }

    public function daftarUlang()
    {
        return $this->hasMany(DaftarUlang::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }


}
