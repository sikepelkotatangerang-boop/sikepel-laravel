<?php

namespace App\Livewire\SuratKeluar;

use App\Models\Document;
use App\Models\Pejabat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Surat Keluar')]
class Edit extends Component
{
    public $documentId;
    public $nomor_surat;
    public $jenis_dokumen;
    public $tanggal_surat;
    public $perihal;
    public $sifat;
    public $jumlah_lampiran = 0;
    public $tujuan;
    public $isi_surat;
    public $akhiran;
    public $hari_acara;
    public $tanggal_acara;
    public $waktu_acara;
    public $tempat_acara;
    public $data_acara;
    public $pejabat_id;
    public $nama_pejabat;
    public $nip_pejabat;
    public $jabatan;
    public $pejabats = [];

    protected function rules()
    {
        return [
            'nomor_surat' => 'required|string|max:100',
            'jenis_dokumen' => 'required|string|max:100',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'sifat' => 'nullable|string|max:50',
            'jumlah_lampiran' => 'nullable|integer|min:0',
            'tujuan' => 'nullable|string',
            'isi_surat' => 'nullable|string',
            'akhiran' => 'nullable|string',
            'hari_acara' => 'nullable|string|max:50',
            'tanggal_acara' => 'nullable|string|max:100',
            'waktu_acara' => 'nullable|string|max:100',
            'tempat_acara' => 'nullable|string',
            'data_acara' => 'nullable|string',
            'pejabat_id' => 'nullable|exists:pejabat,id',
            'nama_pejabat' => 'nullable|string|max:255',
            'nip_pejabat' => 'nullable|string|max:50',
            'jabatan' => 'nullable|string|max:100',
        ];
    }

    public function mount($id)
    {
        $doc = Document::findOrFail($id);
        $this->documentId = $doc->id;
        $this->nomor_surat = $doc->nomor_surat;
        $this->jenis_dokumen = $doc->jenis_dokumen;
        $this->tanggal_surat = $doc->tanggal_surat->format('Y-m-d');
        $this->perihal = $doc->perihal;
        $this->sifat = $doc->sifat;
        $this->jumlah_lampiran = $doc->jumlah_lampiran;
        $this->tujuan = $doc->tujuan;
        $this->isi_surat = $doc->isi_surat;
        $this->akhiran = $doc->akhiran;
        $this->hari_acara = $doc->hari_acara;
        $this->tanggal_acara = $doc->tanggal_acara;
        $this->waktu_acara = $doc->waktu_acara;
        $this->tempat_acara = $doc->tempat_acara;
        $this->data_acara = $doc->data_acara;
        $this->nama_pejabat = $doc->nama_pejabat;
        $this->nip_pejabat = $doc->nip_pejabat;
        $this->jabatan = $doc->jabatan;
        $this->pejabats = Pejabat::where('is_active', true)->get();
    }

    public function updatedPejabatId($value)
    {
        if ($value) {
            $pejabat = Pejabat::find($value);
            if ($pejabat) {
                $this->nama_pejabat = $pejabat->nama;
                $this->nip_pejabat = $pejabat->nip;
                $this->jabatan = $pejabat->jabatan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        $doc = Document::findOrFail($this->documentId);
        $doc->update($this->only([
            'nomor_surat', 'jenis_dokumen', 'tanggal_surat', 'perihal',
            'sifat', 'jumlah_lampiran', 'tujuan', 'isi_surat', 'akhiran',
            'hari_acara', 'tanggal_acara', 'waktu_acara', 'tempat_acara', 'data_acara',
            'nama_pejabat', 'nip_pejabat', 'jabatan',
        ]));
        session()->flash('message', 'Surat keluar berhasil diperbarui.');
        $this->redirect(route('surat-keluar.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.surat-keluar.edit');
    }
}
