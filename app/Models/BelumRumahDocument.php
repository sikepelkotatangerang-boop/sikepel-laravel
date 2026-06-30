<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BelumRumahDocument extends Model
{
    protected $table = 'belum_rumah_documents';
    protected $fillable = [
        'nomor_surat', 'tanggal_surat',
        'nik_pemohon', 'nama_pemohon', 'tempat_lahir', 'tanggal_lahir',
        'kelamin_pemohon', 'agama', 'pekerjaan', 'perkawinan', 'negara',
        'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kota_kabupaten',
        'peruntukan', 'pengantar_rt',
        'pejabat_id', 'nama_pejabat', 'nip_pejabat', 'jabatan',
        'google_drive_id', 'google_drive_url', 'file_name', 'file_size', 'mime_type',
        'kelurahan_id', 'created_by', 'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_surat' => 'datetime',
            'tanggal_lahir' => 'date',
            'file_size' => 'integer',
        ];
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class);
    }
}
