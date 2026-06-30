<div>
    @if (session('message'))
        <div class="mb-4 px-5 py-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 px-5 py-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-gray-800">Daftar Role</h3>
                    <button wire:click="$set('showCreateForm', true)" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">+ Baru</button>
                </div>
                @if($showCreateForm)
                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50/50">
                        <form wire:submit="create" class="flex gap-2">
                            <input wire:model="newRoleName" type="text" placeholder="Nama role baru" class="flex-1 border border-gray-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400">
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-white bg-emerald-600 rounded-xl hover:bg-emerald-700">Simpan</button>
                            <button type="button" wire:click="cancel" class="px-3 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200">Batal</button>
                        </form>
                        @error('newRoleName') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                @endif
                <div class="divide-y divide-gray-100">
                    @foreach($roles as $role)
                        <div wire:click="edit({{ $role->id }})" class="px-5 py-3.5 flex items-center justify-between hover:bg-gray-50/50 cursor-pointer transition-colors {{ $editingRole && $editingRole->id === $role->id ? 'bg-emerald-50 border-l-4 border-emerald-500' : '' }}">
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ ucfirst($role->name) }}</p>
                                <p class="text-xs text-gray-500">{{ $role->permissions->count() }} permissions</p>
                            </div>
                            @can('roles.delete')
                            <button wire:click.stop="delete({{ $role->id }})" onclick="return confirm('Hapus role ini?')" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-red-500 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                            @endcan
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            @if($editingRole)
                <form wire:submit="save" class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <h3 class="text-sm font-semibold text-gray-800">Edit Role:</h3>
                            <input wire:model="roleName" type="text" class="border border-gray-200 rounded-xl text-sm px-3 py-1.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 w-48">
                        </div>
                        <button type="button" wire:click="cancel" class="text-sm text-gray-500 hover:text-gray-700">Tutup</button>
                    </div>
                    <div class="p-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($permissions as $group => $perms)
                                <div class="border border-gray-200 rounded-xl p-4">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">{{ $group }}</p>
                                    <div class="space-y-2">
                                        @foreach($perms as $p)
                                            <label class="flex items-center gap-2.5 cursor-pointer group">
                                                <input type="checkbox" value="{{ $p->name }}" wire:model="selectedPermissions" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                                <span class="text-sm text-gray-700 group-hover:text-gray-900">{{ $p->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-5 py-4 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl shadow-sm hover:shadow-md hover:bg-emerald-700 transition-all">Simpan Perubahan</button>
                    </div>
                </form>
            @else
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                    <div class="flex flex-col items-center gap-3">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <p class="text-sm text-gray-400">Pilih role di samping untuk mengelola permissions</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
