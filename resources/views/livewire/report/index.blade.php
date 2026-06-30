<div>
    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="group bg-white rounded-2xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:border-slate-200 transition-all duration-200 cursor-pointer {{ $type === 'surat-keluar' ? 'ring-2 ring-indigo-500' : '' }}" wire:click="$set('type', 'surat-keluar')">
            <p class="text-3xl font-bold text-slate-900">{{ $summary['surat-keluar'] }}</p>
            <p class="text-xs text-slate-500 mt-1">Surat Keluar</p>
        </div>
        <div class="group bg-white rounded-2xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:border-slate-200 transition-all duration-200 cursor-pointer {{ $type === 'surat-masuk' ? 'ring-2 ring-emerald-500' : '' }}" wire:click="$set('type', 'surat-masuk')">
            <p class="text-3xl font-bold text-slate-900">{{ $summary['surat-masuk'] }}</p>
            <p class="text-xs text-slate-500 mt-1">Surat Masuk</p>
        </div>
        <div class="group bg-white rounded-2xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:border-slate-200 transition-all duration-200 cursor-pointer {{ $type === 'sktm' ? 'ring-2 ring-amber-500' : '' }}" wire:click="$set('type', 'sktm')">
            <p class="text-3xl font-bold text-slate-900">{{ $summary['sktm'] }}</p>
            <p class="text-xs text-slate-500 mt-1">SKTM</p>
        </div>
        <div class="group bg-white rounded-2xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:border-slate-200 transition-all duration-200 cursor-pointer {{ $type === 'belum-rumah' ? 'ring-2 ring-violet-500' : '' : '' }}" wire:click="$set('type', 'belum-rumah')">
            <p class="text-3xl font-bold text-slate-900">{{ $summary['belum-rumah'] }}</p>
            <p class="text-xs text-slate-500 mt-1">Belum Rumah</p>
        </div>
    </div>

    {{-- Report Table --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">
                    @switch($type)
                        @case('surat-keluar') Surat Keluar @break
                        @case('surat-masuk') Surat Masuk @break
                        @case('sktm') SKTM @break
                        @case('belum-rumah') Belum Rumah @break
                    @endswitch
                </h3>
                <input wire:model.live="dateStart" type="date" class="border border-slate-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                <span class="text-slate-400 text-sm">s.d.</span>
                <input wire:model.live="dateEnd" type="date" class="border border-slate-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
            </div>
            <a href="{{ route('pdf.report', $type) }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl shadow-sm hover:shadow-md transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export PDF
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-500 text-left">
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">No</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">No. Surat</th>
                        @if(in_array($type, ['sktm', 'belum-rumah']))
                            <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Nama Pemohon</th>
                            <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">NIK</th>
                        @else
                            <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Perihal</th>
                            <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">{{ $type === 'surat-keluar' ? 'Tujuan' : 'Asal' }}</th>
                        @endif
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3.5 font-semibold text-[11px] uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($data as $i => $d)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 text-slate-600">{{ $i + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $d->nomor_surat ?? $d->nik_pemohon ?? '-' }}</td>
                            @if(in_array($type, ['sktm', 'belum-rumah']))
                                <td class="px-6 py-4 text-slate-600">{{ $d->nama_pemohon ?? '-' }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ $d->nik_pemohon ?? '-' }}</td>
                            @else
                                <td class="px-6 py-4 text-slate-600 max-w-xs truncate">{{ $d->perihal ?? '-' }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ $d->tujuan ?? $d->asal_surat ?? '-' }}</td>
                            @endif
                            <td class="px-6 py-4 text-slate-600">{{ $d->tanggal_surat?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200">{{ $d->status ?? 'active' }}</span></td>
                            <td class="px-6 py-4 text-right">
                                @if($type === 'surat-keluar' && $d->nomor_surat)
                                    <a href="{{ route('pdf.surat-keluar', $d->id) }}" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all" title="Download PDF"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></a>
                                @endif
                                @if($type === 'sktm')
                                    <a href="{{ route('pdf.sktm', $d->id) }}" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all" title="Download PDF"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></a>
                                @endif
                                @if($type === 'belum-rumah')
                                    <a href="{{ route('pdf.belum-rumah', $d->id) }}" class="p-2 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all" title="Download PDF"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-6 py-12 text-center"><svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg><p class="text-slate-500">Tidak ada data</p></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>