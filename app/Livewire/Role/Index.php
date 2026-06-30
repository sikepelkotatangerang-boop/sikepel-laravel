<?php

namespace App\Livewire\Role;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#[Layout('layouts.app')]
#[Title('Role & Permission')]
class Index extends Component
{
    public $editingRole = null;
    public $roleName;
    public $selectedPermissions = [];
    public $showCreateForm = false;
    public $newRoleName = [];

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->editingRole = $role->id;
        $this->roleName = $role->name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
    }

    public function cancel()
    {
        $this->editingRole = null;
        $this->roleName = '';
        $this->selectedPermissions = [];
        $this->showCreateForm = false;
    }

    public function save()
    {
        $role = Role::findOrFail($this->editingRole);
        $role->name = $this->roleName;
        $role->save();
        $role->syncPermissions(array_values($this->selectedPermissions));

        session()->flash('message', 'Role berhasil diperbarui.');
        $this->cancel();
    }

    public function create()
    {
        $this->validate(['newRoleName' => 'required|string|max:255|unique:roles,name']);
        Role::create(['name' => $this->newRoleName]);
        session()->flash('message', 'Role baru berhasil dibuat.');
        $this->newRoleName = '';
        $this->showCreateForm = false;
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        if ($role->users()->count() > 0) {
            session()->flash('error', 'Role masih memiliki pengguna.');
            return;
        }
        $role->delete();
        session()->flash('message', 'Role berhasil dihapus.');
    }

    public function render()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all()->groupBy(fn($p) => explode('.', $p->name)[0]);
        return view('livewire.role.index', compact('roles', 'permissions'));
    }
}
