<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'nomor_surat', 'jenis_dokumen', 'tanggal_surat', 'perihal',
        'sifat', 'jumlah_lampiran', 'tujuan', 'isi_surat', 'akhiran',
        'hari_acara', 'tanggal_acara', 'waktu_acara', 'tempat_acara', 'data_acara',
        'nama_pejabat', 'nip_pejabat', 'jabatan',
        'storage_bucket_url', 'file_name', 'file_size', 'mime_type',
        'kelurahan_id', 'created_by', 'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_surat' => 'date',
            'jumlah_lampiran' => 'integer',
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
}
