<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    protected $table = 'pejabat';
    protected $fillable = [
        'kelurahan_id', 'nama', 'nip', 'jabatan', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function sktmDocuments()
    {
        return $this->hasMany(SktmDocument::class);
    }

    public function belumRumahDocuments()
    {
        return $this->hasMany(BelumRumahDocument::class);
    }
}
