<?php

namespace App\Livewire\SuratKeluar;

use App\Models\Document;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Surat Keluar')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $jenisFilter = '';
    public $statusFilter = '';

    public function delete($id)
    {
        $doc = Document::findOrFail($id);
        $doc->update(['status' => 'deleted']);
        session()->flash('message', 'Surat berhasil dihapus.');
    }

    public function render()
    {
        $query = Document::query()->where('status', '!=', 'deleted');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nomor_surat', 'like', '%' . $this->search . '%')
                    ->orWhere('perihal', 'like', '%' . $this->search . '%')
                    ->orWhere('tujuan', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->jenisFilter) {
            $query->where('jenis_dokumen', $this->jenisFilter);
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $documents = $query->orderBy('created_at', 'desc')->paginate(10);

        $jenisList = Document::select('jenis_dokumen')->distinct()->pluck('jenis_dokumen');

        return view('livewire.surat-keluar.index', compact('documents', 'jenisList'));
    }
}
