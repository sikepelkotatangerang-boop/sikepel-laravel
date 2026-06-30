<?php

namespace App\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Surat Masuk')]
class Edit extends Component
{
    public $documentId;
    public $nomor_surat;
    public $tanggal_masuk;
    public $tanggal_surat;
    public $asal_surat;
    public $perihal;
    public $disposisi;
    public $status;

    protected function rules()
    {
        return [
            'nomor_surat' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'perihal' => 'required|string',
            'disposisi' => 'nullable|string',
            'status' => 'nullable|string|max:20',
        ];
    }

    public function mount($id)
    {
        $doc = SuratMasuk::findOrFail($id);
        $this->documentId = $doc->id;
        $this->nomor_surat = $doc->nomor_surat;
        $this->tanggal_masuk = $doc->tanggal_masuk->format('Y-m-d');
        $this->tanggal_surat = $doc->tanggal_surat->format('Y-m-d');
        $this->asal_surat = $doc->asal_surat;
        $this->perihal = $doc->perihal;
        $this->disposisi = $doc->disposisi;
        $this->status = $doc->status;
    }

    public function save()
    {
        $this->validate();
        $doc = SuratMasuk::findOrFail($this->documentId);
        $doc->update([
            'nomor_surat' => $this->nomor_surat,
            'tanggal_masuk' => $this->tanggal_masuk,
            'tanggal_surat' => $this->tanggal_surat,
            'asal_surat' => $this->asal_surat,
            'perihal' => $this->perihal,
            'disposisi' => $this->disposisi,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Surat masuk berhasil diperbarui.');
        $this->redirect(route('surat-masuk.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.surat-masuk.edit');
    }
}
