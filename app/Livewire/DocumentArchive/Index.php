<?php

namespace App\Livewire\DocumentArchive;

use App\Models\Document;
use App\Models\SuratMasuk;
use App\Models\SKTMDocument;
use App\Models\BelumRumahDocument;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Arsip & Pencarian Dokumen')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $jenisFilter = '';
    public $dateStart = '';
    public $dateEnd = '';

    protected $queryString = ['search', 'jenisFilter', 'dateStart', 'dateEnd'];

    public function render()
    {
        $results = collect();

        $sources = [];

        if (!$this->jenisFilter || $this->jenisFilter === 'surat-keluar') {
            $query = Document::query()->where('status', '!=', 'deleted');
            if ($this->search) {
                $s = $this->search;
                $query->where(function ($q) use ($s) {
                    $q->where('nomor_surat', 'like', "%{$s}%")
                        ->orWhere('perihal', 'like', "%{$s}%")
                        ->orWhere('tujuan', 'like', "%{$s}%");
                });
            }
            if ($this->dateStart) $query->where('tanggal_surat', '>=', $this->dateStart);
            if ($this->dateEnd) $query->where('tanggal_surat', '<=', $this->dateEnd);
            $results = $results->concat($query->limit(100)->get()->map(fn($i) => [
                'id' => $i->id, 'source' => 'surat-keluar', 'source_label' => 'Surat Keluar',
                'nomor_surat' => $i->nomor_surat, 'perihal' => $i->perihal,
                'subjek' => $i->tujuan ?? '-', 'tanggal_surat' => $i->tanggal_surat,
                'status' => $i->status,
            ]));
        }

        if (!$this->jenisFilter || $this->jenisFilter === 'surat-masuk') {
            $query = SuratMasuk::query();
            if ($this->search) {
                $s = $this->search;
                $query->where(function ($q) use ($s) {
                    $q->where('nomor_surat', 'like', "%{$s}%")
                        ->orWhere('perihal', 'like', "%{$s}%")
                        ->orWhere('asal_surat', 'like', "%{$s}%");
                });
            }
            if ($this->dateStart) $query->where('tanggal_surat', '>=', $this->dateStart);
            if ($this->dateEnd) $query->where('tanggal_surat', '<=', $this->dateEnd);
            $results = $results->concat($query->limit(100)->get()->map(fn($i) => [
                'id' => $i->id, 'source' => 'surat-masuk', 'source_label' => 'Surat Masuk',
                'nomor_surat' => $i->nomor_surat, 'perihal' => $i->perihal,
                'subjek' => $i->asal_surat ?? '-', 'tanggal_surat' => $i->tanggal_surat,
                'status' => $i->status,
            ]));
        }

        if (!$this->jenisFilter || $this->jenisFilter === 'sktm') {
            $query = SKTMDocument::query();
            if ($this->search) {
                $s = $this->search;
                $query->where(function ($q) use ($s) {
                    $q->where('nomor_surat', 'like', "%{$s}%")
                        ->orWhere('nik_pemohon', 'like', "%{$s}%")
                        ->orWhere('nama_pemohon', 'like', "%{$s}%");
                });
            }
            if ($this->dateStart) $query->where('tanggal_surat', '>=', $this->dateStart);
            if ($this->dateEnd) $query->where('tanggal_surat', '<=', $this->dateEnd);
            $results = $results->concat($query->limit(100)->get()->map(fn($i) => [
                'id' => $i->id, 'source' => 'sktm', 'source_label' => 'SKTM',
                'nomor_surat' => $i->nomor_surat,
                'perihal' => $i->peruntukan ?? 'Pengajuan SKTM',
                'subjek' => $i->nama_pemohon . ' (' . ($i->nik_pemohon ?? '-') . ')',
                'tanggal_surat' => $i->tanggal_surat, 'status' => $i->status,
            ]));
        }

        if (!$this->jenisFilter || $this->jenisFilter === 'belum-rumah') {
            $query = BelumRumahDocument::query();
            if ($this->search) {
                $s = $this->search;
                $query->where(function ($q) use ($s) {
                    $q->where('nomor_surat', 'like', "%{$s}%")
                        ->orWhere('nik_pemohon', 'like', "%{$s}%")
                        ->orWhere('nama_pemohon', 'like', "%{$s}%");
                });
            }
            if ($this->dateStart) $query->where('tanggal_surat', '>=', $this->dateStart);
            if ($this->dateEnd) $query->where('tanggal_surat', '<=', $this->dateEnd);
            $results = $results->concat($query->limit(100)->get()->map(fn($i) => [
                'id' => $i->id, 'source' => 'belum-rumah', 'source_label' => 'Belum Rumah',
                'nomor_surat' => $i->nomor_surat,
                'perihal' => $i->peruntukan ?? 'Surat Belum Rumah',
                'subjek' => $i->nama_pemohon . ' (' . ($i->nik_pemohon ?? '-') . ')',
                'tanggal_surat' => $i->tanggal_surat, 'status' => $i->status,
            ]));
        }

        $results = $results->sortByDesc('tanggal_surat');

        return view('livewire.document-archive.index', compact('results'));
    }
}
