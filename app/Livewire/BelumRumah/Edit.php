<?php

namespace App\Livewire\BelumRumah;

use App\Models\BelumRumahDocument;
use App\Models\Pejabat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit SK Belum Rumah')]
class Edit extends Component
{
    public $documentId;
    public $nomor_surat;
    public $tanggal_surat;
    public $nik_pemohon;
    public $nama_pemohon;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $kelamin_pemohon;
    public $agama;
    public $pekerjaan;
    public $perkawinan;
    public $negara = 'Indonesia';
    public $alamat;
    public $rt;
    public $rw;
    public $kelurahan;
    public $kecamatan;
    public $kota_kabupaten;
    public $peruntukan;
    public $pengantar_rt;
    public $pejabat_id;
    public $nama_pejabat;
    public $nip_pejabat;
    public $jabatan;
    public $pejabats = [];

    protected function rules()
    {
        return [
            'nomor_surat' => 'required|string|max:100',
            'tanggal_surat' => 'required|date',
            'nik_pemohon' => 'required|string|max:16',
            'nama_pemohon' => 'required|string|max:150',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'kelamin_pemohon' => 'nullable|string|max:20',
            'agama' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:100',
            'perkawinan' => 'nullable|string|max:50',
            'negara' => 'nullable|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'peruntukan' => 'required|string',
            'pengantar_rt' => 'nullable|string|max:100',
            'pejabat_id' => 'nullable|exists:pejabat,id',
            'nama_pejabat' => 'required|string|max:150',
            'nip_pejabat' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
        ];
    }

    public function mount($id)
    {
        $doc = BelumRumahDocument::findOrFail($id);
        $this->documentId = $doc->id;
        foreach ($doc->getAttributes() as $key => $value) {
            if (property_exists($this, $key) && $key !== 'documentId') {
                $this->$key = $value;
            }
        }
        if ($this->tanggal_surat && !is_string($this->tanggal_surat)) {
            $this->tanggal_surat = $this->tanggal_surat->format('Y-m-d H:i:s');
        }
        if ($this->tanggal_lahir && !is_string($this->tanggal_lahir)) {
            $this->tanggal_lahir = $this->tanggal_lahir->format('Y-m-d');
        }
        $this->pejabats = Pejabat::where('is_active', true)->get();
    }

    public function updatedPejabatId($value)
    {
        if ($value) {
            $p = Pejabat::find($value);
            if ($p) {
                $this->nama_pejabat = $p->nama;
                $this->nip_pejabat = $p->nip;
                $this->jabatan = $p->jabatan;
            }
        }
    }

    public function save()
    {
        $this->validate();
        $doc = BelumRumahDocument::findOrFail($this->documentId);
        $doc->update($this->except(['documentId', 'pejabats']));
        session()->flash('message', 'Data berhasil diperbarui.');
        $this->redirect(route('belum-rumah.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.belum-rumah.edit');
    }
}
