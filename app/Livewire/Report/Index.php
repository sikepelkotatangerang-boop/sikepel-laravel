<?php

namespace App\Livewire\Report;

use App\Models\Document;
use App\Models\SuratMasuk;
use App\Models\SKTMDocument;
use App\Models\BelumRumahDocument;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Laporan')]
class Index extends Component
{
    public $type = 'surat-keluar';
    public $dateStart = '';
    public $dateEnd = '';
    public $summary = [];

    public function mount()
    {
        $this->summary = [
            'surat-keluar' => Document::where('status', '!=', 'deleted')->count(),
            'surat-masuk' => SuratMasuk::count(),
            'sktm' => SKTMDocument::count(),
            'belum-rumah' => BelumRumahDocument::count(),
        ];
    }

    public function render()
    {
        $query = match ($this->type) {
            'surat-keluar' => Document::where('status', '!=', 'deleted'),
            'surat-masuk' => SuratMasuk::query(),
            'sktm' => SKTMDocument::query(),
            'belum-rumah' => BelumRumahDocument::query(),
            default => Document::query(),
        };

        if ($this->dateStart) $query->where('tanggal_surat', '>=', $this->dateStart);
        if ($this->dateEnd) $query->where('tanggal_surat', '<=', $this->dateEnd);

        $data = $query->orderBy('tanggal_surat', 'desc')->get();

        return view('livewire.report.index', compact('data'));
    }
}
