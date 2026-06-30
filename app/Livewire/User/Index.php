<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
#[Title('Pengguna')]
class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';

    public function delete($id)
    {
        if ($id === auth()->id()) {
            session()->flash('error', 'Tidak dapat menghapus akun sendiri.');
            return;
        }
        User::findOrFail($id)->delete();
        session()->flash('message', 'Pengguna berhasil dihapus.');
    }

    public function render()
    {
        $query = User::query();

        if ($this->search) {
            $s = $this->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%")
                    ->orWhere('nip', 'like', "%{$s}%");
            });
        }

        if ($this->roleFilter) {
            $query->role($this->roleFilter);
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);
        $roles = Role::all();

        return view('livewire.user.index', compact('users', 'roles'));
    }
}
