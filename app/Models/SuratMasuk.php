<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $fillable = [
        'nomor_surat', 'tanggal_masuk', 'tanggal_surat', 'asal_surat',
        'perihal', 'disposisi', 'file_url', 'file_name', 'file_size',
        'kelurahan_id', 'created_by', 'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'date',
            'tanggal_surat' => 'date',
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
