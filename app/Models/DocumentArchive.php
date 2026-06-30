<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentArchive extends Model
{
    protected $table = 'document_archives';

    protected $fillable = [
        'nomor_surat', 'jenis_dokumen', 'tanggal_surat', 'perihal',
        'nik_subjek', 'nama_subjek', 'alamat_subjek', 'data_detail',
        'pejabat_id', 'nama_pejabat', 'nip_pejabat', 'jabatan_pejabat',
        'google_drive_id', 'google_drive_url', 'file_name', 'file_size', 'mime_type',
        'kelurahan_id', 'created_by', 'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_surat' => 'date',
            'file_size' => 'integer',
            'data_detail' => 'json',
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
