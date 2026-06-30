<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = [
        'nama', 'nama_lengkap', 'alamat', 'kecamatan', 'kota',
        'kode_pos', 'telepon', 'email', 'nama_lurah', 'nip_lurah',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pejabats()
    {
        return $this->hasMany(Pejabat::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }
}
