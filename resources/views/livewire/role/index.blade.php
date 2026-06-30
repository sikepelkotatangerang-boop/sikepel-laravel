<div>
    @if (session('message'))
        <div class="mb-6 px-4 py-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-2 animate-slide-in">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Role & Permission</h3>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-6">
            {{-- Role List --}}
            <div class="lg:col-span-1 space-y-4">
                <div class="bg-slate-50/50 rounded-xl p-4 border border-slate-100">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-sm font-semibold text-slate-700">Daftar Role</h4>
                        <button wire:click="$set('showCreateForm', true)" class="text-xs font-medium text-indigo-600 hover:text-indigo-700">+ Baru</button>
                    </div>

                    @if($showCreateForm)
                        <form wire:submit="create" class="flex gap-2 mb-3">
                            <input wire:model="newRoleName" type="text" placeholder="Nama role" class="flex-1 border border-slate-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400">
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors">Simpan</button>
                            <button type="button" wire:click="cancel" class="px-3 py-2 text-sm font-medium text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200 transition-colors">Batal</button>
                        </form>
                        @error('newRoleName') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
                    @endif

                    <div class="divide-y divide-slate-100">
                        @foreach($roles as $role)
                            <div class="px-3 py-3 flex items-center justify-between hover:bg-slate-50/50 rounded-xl cursor-pointer {{ $editingRole === $role->id ? 'bg-indigo-50 border-l-4 border-indigo-500' : '' }}" wire:click="edit({{ $role->id }})">
                                <div>
                                    <p class="text-sm font-medium text-slate-900">{{ ucfirst($role->name) }}</p>
                                    <p class="text-[10px] text-slate-500">{{ $role->permissions->count() }} permissions</p>
                                </div>
                                @can('roles.delete')
                                <button wire:click.stop="delete({{ $role->id }})" onclick="return confirm('Hapus role ini?')" class="text-red-400 hover:text-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                                @endcan
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Permissions Editor --}}
            <div class="lg:col-span-2">
                @if($editingRole)
                    <form wire:submit="save" class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <h4 class="text-sm font-semibold text-slate-700">Edit Role:</h4>
                                <input wire:model="roleName" type="text" class="border border-slate-200 rounded-xl text-sm px-3 py-1.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 w-48">
                            </div>
                            <button type="button" wire:click="cancel" class="text-sm text-slate-500 hover:text-slate-700">Tutup</button>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($permissions as $group => $perms)
                                    <div class="border border-slate-200 rounded-xl p-4">
                                        <p class="text-[10px] font-semibold text-slate-500 uppercase mb-2">{{ $group }}</p>
                                        <div class="space-y-2">
                                            @foreach($perms as $p)
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="checkbox" value="{{ $p->name }}" wire:model="selectedPermissions" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                                    <span class="text-sm text-slate-700">{{ $p->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="px-6 py-4 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors">Simpan Perubahan</button>
                        </div>
                    </form>
                @else
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-10 text-center text-slate-500 text-sm">
                        Pilih role di samping untuk mengelola permissions
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>