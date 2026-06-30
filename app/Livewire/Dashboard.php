<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\SuratMasuk;
use App\Models\SKTMDocument;
use App\Models\BelumRumahDocument;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public $totalSuratKeluar = 0;
    public $totalSuratMasuk = 0;
    public $totalSKTM = 0;
    public $totalBelumRumah = 0;
    public $suratMasukTerbaru = [];
    public $aktivitasTerbaru = [];

    public function mount()
    {
        $this->totalSuratKeluar = Document::where('status', '!=', 'deleted')->count();
        $this->totalSuratMasuk = SuratMasuk::count();
        $this->totalSKTM = SKTMDocument::count();
        $this->totalBelumRumah = BelumRumahDocument::count();

        $this->suratMasukTerbaru = SuratMasuk::with('creator')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentDocuments = Document::where('status', '!=', 'deleted')
            ->orderBy('created_at', 'desc')
            ->take(3)->get()->map(fn($d) => [
                'type' => 'surat_keluar', 'label' => 'Surat Keluar',
                'message' => "Surat {$d->nomor_surat} dibuat", 'time' => $d->created_at,
            ]);

        $recentMasuk = SuratMasuk::orderBy('created_at', 'desc')
            ->take(3)->get()->map(fn($d) => [
                'type' => 'surat_masuk', 'label' => 'Surat Masuk',
                'message' => "Surat dari {$d->asal_surat} diterima", 'time' => $d->created_at,
            ]);

        $recentSKTM = SKTMDocument::orderBy('created_at', 'desc')
            ->take(2)->get()->map(fn($d) => [
                'type' => 'sktm', 'label' => 'SKTM',
                'message' => "SKTM untuk {$d->nama_pemohon} dibuat", 'time' => $d->created_at,
            ]);

        $this->aktivitasTerbaru = collect()
            ->concat($recentDocuments)
            ->concat($recentMasuk)
            ->concat($recentSKTM)
            ->sortByDesc('time')
            ->take(8)
            ->values()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
