<div>
    <form wire:submit="save">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-base font-semibold text-gray-800">Edit Pejabat</h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input wire:model="nama" type="text" class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-colors">
                        @error('nama') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">NIP</label>
                        <input wire:model="nip" type="text" class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-colors">
                        @error('nip') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                        <input wire:model="jabatan" type="text" class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-colors">
                        @error('jabatan') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex items-center gap-2 pt-6">
                        <input wire:model="is_active" type="checkbox" id="is_active" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex items-center justify-end gap-3">
                <a href="{{ route('pejabat.index') }}" wire:navigate class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl hover:bg-emerald-700 shadow-sm hover:shadow-md transition-all">Simpan</button>
            </div>
        </div>
    </form>
</div>