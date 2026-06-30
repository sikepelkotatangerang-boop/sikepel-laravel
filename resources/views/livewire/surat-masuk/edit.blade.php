<div>
    <form wire:submit="save" class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Edit Surat Masuk</h3>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">No. Surat</label>
                    <input wire:model="nomor_surat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('nomor_surat') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Surat</label>
                    <input wire:model="tanggal_surat" type="date" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('tanggal_surat') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Masuk</label>
                    <input wire:model="date" wire:model="tanggal_masuk" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('tanggal_masuk') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Asal Surat</label>
                    <input wire:model="asal_surat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('asal_surat') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Perihal</label>
                    <input wire:model="perihal" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('perihal') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Disposisi</label>
                    <textarea wire:model="disposisi" rows="3" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></textarea>
                </div>
            </div>
            <div class="border-t border-slate-100 pt-4">
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Status</label>
                <select wire:model="status" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    <option value="pending">Pending</option>
                    <option value="diproses">Diproses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-3 bg-slate-50/50">
            <a href="{{ route('surat-masuk.index') }}" wire:navigate class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm hover:shadow-md transition-all">Simpan</button>
        </div>
    </form>
</div>