<?php

namespace App\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Catat Surat Masuk')]
class Create extends Component
{
    public $nomor_surat;
    public $tanggal_masuk;
    public $tanggal_surat;
    public $asal_surat;
    public $perihal;
    public $disposisi;

    protected function rules()
    {
        return [
            'nomor_surat' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'perihal' => 'required|string',
            'disposisi' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $this->tanggal_masuk = now()->format('Y-m-d');
        $this->tanggal_surat = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        SuratMasuk::create([
            'nomor_surat' => $this->nomor_surat,
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_surat' => $this->tanggal_surat,
            'asal_surat' => $this->asal_surat,
            'perihal' => $this->perihal,
            'disposisi' => $this->disposisi,
            'kelurahan_id' => auth()->user()->kelurahan_id,
            'created_by' => auth()->id(),
            'status' => 'pending',
        ]);

        session()->flash('message', 'Surat masuk berhasil dicatat.');
        $this->redirect(route('surat-masuk.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.surat-masuk.create');
    }
}
