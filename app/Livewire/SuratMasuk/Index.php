<?php

namespace App\Livewire\SuratMasuk;

use App\Models\SuratMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Surat Masuk')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function delete($id)
    {
        $doc = SuratMasuk::findOrFail($id);
        $doc->update(['status' => 'deleted']);
        session()->flash('message', 'Surat masuk berhasil dihapus.');
    }

    public function render()
    {
        $query = SuratMasuk::query()->where('status', '!=', 'deleted');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nomor_surat', 'like', '%' . $this->search . '%')
                    ->orWhere('perihal', 'like', '%' . $this->search . '%')
                    ->orWhere('asal_surat', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $documents = $query->orderBy('tanggal_masuk', 'desc')->paginate(10);

        return view('livewire.surat-masuk.index', compact('documents'));
    }
}
