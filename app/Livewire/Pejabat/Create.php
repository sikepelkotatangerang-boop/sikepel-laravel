<?php

namespace App\Livewire\Pejabat;

use App\Models\Pejabat;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Tambah Pejabat')]
class Create extends Component
{
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

    public function save()
    {
        $this->validate();

        Pejabat::create([
            'kelurahan_id' => auth()->user()->kelurahan_id,
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Pejabat berhasil ditambahkan.');
        $this->redirect(route('pejabat.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pejabat.create');
    }
}
