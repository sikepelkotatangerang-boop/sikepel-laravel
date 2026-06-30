<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
#[Title('Tambah Pengguna')]
class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $nip;
    public $position;
    public $phone;
    public $role = 'staff';
    public $is_active = true;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'nip' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|exists:roles,name',
            'is_active' => 'boolean',
        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'nip' => $this->nip,
            'position' => $this->position,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
            'kelurahan_id' => auth()->user()->kelurahan_id,
        ]);

        $user->assignRole($this->role);

        session()->flash('message', 'Pengguna berhasil ditambahkan.');
        $this->redirect(route('users.index'), navigate: true);
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.create', compact('roles'));
    }
}
