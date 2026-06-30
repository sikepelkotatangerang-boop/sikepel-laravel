<?php

namespace App\Livewire\SKTM;

use App\Models\SktmDocument;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('SKTM')]
class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $doc = SktmDocument::findOrFail($id);
        $doc->update(['status' => 'deleted']);
        session()->flash('message', 'SKTM berhasil dihapus.');
    }

    public function render()
    {
        $query = SktmDocument::query()->where('status', '!=', 'deleted');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nomor_surat', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_pemohon', 'like', '%' . $this->search . '%')
                    ->orWhere('nik_pemohon', 'like', '%' . $this->search . '%');
            });
        }

        $documents = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.sktm.index', compact('documents'));
    }
}
