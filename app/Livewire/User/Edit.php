<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
#[Title('Edit Pengguna')]
class Edit extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $nip;
    public $position;
    public $phone;
    public $role;
    public $is_active = true;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:8|confirmed',
            'nip' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|exists:roles,name',
            'is_active' => 'boolean',
        ];
    }

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nip = $user->nip;
        $this->position = $user->position;
        $this->phone = $user->phone;
        $this->is_active = $user->is_active;
        $this->role = $user->getRoleNames()->first() ?? 'staff';
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'nip' => $this->nip,
            'position' => $this->position,
            'phone' => $this->phone,
            'is_active' => $this->is_active,
        ];

        if ($this->password) {
            $data['password'] = $this->password;
        }

        $user = User::findOrFail($this->userId);
        $user->update($data);
        $user->syncRoles([$this->role]);

        session()->flash('message', 'Pengguna berhasil diperbarui.');
        $this->redirect(route('users.index'), navigate: true);
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.edit', compact('roles'));
    }
}
