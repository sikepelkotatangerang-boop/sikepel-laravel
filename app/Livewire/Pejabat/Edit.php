<?php

namespace App\Livewire\Pejabat;

use App\Models\Pejabat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Edit Pejabat')]
class Edit extends Component
{
    public $pejabatId;
    public $nama;
    public $nip;
    public $jabatan;
    public $is_active = true;

    protected function rules()
    {
        return [
            'nama' => 'required|string|max:150',
            'nip' => 'nullable|string|max:30',
            'jabatan' => 'required|string|max:100',
            'is_active' => 'boolean',
        ];
    }

    public function mount($id)
    {
        $p = Pejabat::findOrFail($id);
        $this->pejabatId = $p->id;
        $this->nama = $p->nama;
        $this->nip = $p->nip;
        $this->jabatan = $p->jabatan;
        $this->is_active = $p->is_active;
    }

    public function save()
    {
        $this->validate();

        Pejabat::findOrFail($this->pejabatId)->update([
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Pejabat berhasil diperbarui.');
        $this->redirect(route('pejabat.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pejabat.edit');
    }
}
