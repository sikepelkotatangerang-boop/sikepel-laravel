<?php

namespace App\Livewire\Pejabat;

use App\Models\Pejabat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Pejabat')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = '';

    public function delete($id)
    {
        Pejabat::findOrFail($id)->delete();
        session()->flash('message', 'Pejabat berhasil dihapus.');
    }

    public function render()
    {
        $query = Pejabat::query();

        if ($this->search) {
            $s = $this->search;
            $query->where(function ($q) use ($s) {
                $q->where('nama', 'like', "%{$s}%")
                    ->orWhere('nip', 'like', "%{$s}%")
                    ->orWhere('jabatan', 'like', "%{$s}%");
            });
        }

        if ($this->filter === 'active') $query->where('is_active', true);
        elseif ($this->filter === 'inactive') $query->where('is_active', false);

        $pejabats = $query->orderBy('nama')->paginate(10);

        return view('livewire.pejabat.index', compact('pejabats'));
    }
}
