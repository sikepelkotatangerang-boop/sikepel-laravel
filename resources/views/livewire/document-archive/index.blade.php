<div>
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nomor, perihal, nama..." class="pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:bg-white w-72 transition-all">
                </div>
                <select wire:model.live="jenisFilter" class="border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 bg-white transition-all">
                    <option value="">Semua Jenis</option>
                    <option value="surat-keluar">Surat Keluar</option>
                    <option value="surat-masuk">Surat Masuk</option>
                    <option value="sktm">SKTM</option>
                    <option value="belum-rumah">Belum Rumah</option>
                </select>
                <input wire:model.live="dateStart" type="date" class="border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 bg-white transition-all">
                <span class="text-slate-400 text-sm">s.d.</span>
                <input wire:model.live="dateEnd" type="date" class="border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 bg-white transition-all">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-500 text-left">
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">No. Surat</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Perihal</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Subjek/Tujuan</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($results as $doc)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $doc['nomor_surat'] }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($doc['source'] === 'surat-keluar') bg-indigo-50 text-indigo-700 ring-1 ring-indigo-200
                                    @elseif($doc['source'] === 'surat-masuk') bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200
                                    @elseif($doc['source'] === 'sktm') bg-amber-50 text-amber-700 ring-1 ring-amber-200
                                    @else bg-violet-50 text-violet-700 ring-1 ring-violet-200
                                    @endif">
                                    {{ $doc['source_label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600 max-w-xs truncate">{{ $doc['perihal'] }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $doc['subjek'] }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($doc['tanggal_surat'])->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    @if($doc['status'] === 'active') bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200
                                    @else bg-slate-100 text-slate-700 ring-1 ring-slate-200
                                    @endif">
                                    {{ $doc['status'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-12 text-center"><svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg><p class="text-slate-500">Tidak ada dokumen ditemukan</p></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($results->count() >= 100)<div class="px-6 py-3 border-t border-slate-100 text-center text-sm text-slate-500">Menampilkan hingga 100 hasil. Persempit pencarian.</div>@endif
    </div>
</div>