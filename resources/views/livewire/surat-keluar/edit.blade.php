<div>
    <form wire:submit="save" class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Edit Surat Keluar</h3>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nomor Surat</label>
                    <input wire:model="nomor_surat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" required>
                    @error('nomor_surat') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Jenis Dokumen</label>
                    <input wire:model="jenis_dokumen" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" required>
                    @error('jenis_dokumen') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Surat</label>
                    <input wire:model="tanggal_surat" type="date" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" required>
                    @error('tanggal_surat') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Sifat</label>
                    <input wire:model="sifat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Jumlah Lampiran</label>
                    <input wire:model="jumlah_lampiran" type="number" min="0" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tujuan</label>
                    <input wire:model="tujuan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Perihal</label>
                <textarea wire:model="perihal" rows="2" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" required></textarea>
                @error('perihal') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Isi Surat</label>
                <textarea wire:model="isi_surat" rows="4" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Akhiran</label>
                <textarea wire:model="akhiran" rows="2" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></textarea>
            </div>

            <div class="border-t border-slate-100 pt-6">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Data Acara (Opsional)</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Hari</label><input wire:model="hari_acara" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Acara</label><input wire:model="tanggal_acara" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Waktu</label><input wire:model="waktu_acara" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Tempat</label><input wire:model="tempat_acara" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></div>
                </div>
                <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Data Acara Lengkap</label><textarea wire:model="data_acara" rows="3" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></textarea></div>
            </div>

            <div class="border-t border-slate-100 pt-6">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Pejabat Penandatangan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Pejabat</label><select wire:model="pejabat_id" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"><option value="">Pilih Pejabat</option>@foreach($pejabats as $p)<option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->jabatan }})</option>@endforeach</select></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Pejabat</label><input wire:model="nama_pejabat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">NIP</label><input wire:model="nip_pejabat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly></div>
                    <div><label class="block text-sm font-medium text-slate-700 mb-1.5">Jabatan</label><input wire:model="jabatan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly></div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-3 bg-slate-50/50">
            <a href="{{ route('surat-keluar.index') }}" wire:navigate class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm hover:shadow-md transition-all">Simpan</button>
        </div>
    </form>
</div>