<div>
    <form wire:submit="save" class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Buat SKTM</h3>
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
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">NIK Pemohon</label>
                    <input wire:model="nik_pemohon" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('nik_pemohon') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Pemohon</label>
                    <input wire:model="nama_pemohon" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                    @error('nama_pemohon') <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tempat Lahir</label>
                    <input wire:model="tempat_lahir" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal Lahir</label>
                    <input wire:model="tanggal_lahir" type="date" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Jenis Kelamin</label>
                    <select wire:model="kelamin_pemohon" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Agama</label>
                    <input wire:model="agama" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Pekerjaan</label>
                    <input wire:model="pekerjaan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Perkawinan</label>
                    <input wire:model="perkawinan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kewarganegaraan</label>
                    <input wire:model="negara" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Alamat</label>
                    <input wire:model="alamat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">RT</label>
                    <input wire:model="rt" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">RW</label>
                    <input wire:model="rw" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kelurahan</label>
                    <input wire:model="kelurahan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kecamatan</label>
                    <input wire:model="kecamatan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kota/Kabupaten</label>
                    <input wire:model="kota_kabupaten" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Desil</label>
                    <input wire:model="desil" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Peruntukan</label>
                    <input wire:model="peruntukan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Pengantar RT</label>
                    <input wire:model="pengantar_rt" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                </div>
            </div>

            <div class="border-t border-slate-100 pt-6">
                <h4 class="text-sm font-semibold text-slate-700 mb-3">Pejabat Penandatangan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Pejabat</label>
                        <select wire:model="pejabat_id" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                            <option value="">Pilih Pejabat</option>
                            @foreach($pejabats as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->jabatan }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Pejabat</label>
                        <input wire:model="nama_pejabat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">NIP</label>
                        <input wire:model="nip_pejabat" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jabatan</label>
                        <input wire:model="jabatan" type="text" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-slate-100 flex justify-end gap-3 bg-slate-50/50">
            <a href="{{ route('sktm.index') }}" wire:navigate class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 shadow-sm hover:shadow-md transition-all">Simpan</button>
        </div>
    </form>
</div>