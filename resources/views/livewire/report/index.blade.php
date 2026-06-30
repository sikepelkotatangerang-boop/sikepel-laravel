<div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center cursor-pointer hover:shadow-md transition-all duration-150 {{ $type === 'surat-keluar' ? 'ring-2 ring-emerald-500' : '' }}" wire:click="$set('type', 'surat-keluar')">
            <p class="text-2xl font-bold text-gray-800">{{ $summary['surat-keluar'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Surat Keluar</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center cursor-pointer hover:shadow-md transition-all duration-150 {{ $type === 'surat-masuk' ? 'ring-2 ring-emerald-500' : '' }}" wire:click="$set('type', 'surat-masuk')">
            <p class="text-2xl font-bold text-gray-800">{{ $summary['surat-masuk'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Surat Masuk</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center cursor-pointer hover:shadow-md transition-all duration-150 {{ $type === 'sktm' ? 'ring-2 ring-emerald-500' : '' }}" wire:click="$set('type', 'sktm')">
            <p class="text-2xl font-bold text-gray-800">{{ $summary['sktm'] }}</p>
            <p class="text-xs text-gray-500 mt-1">SKTM</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 text-center cursor-pointer hover:shadow-md transition-all duration-150 {{ $type === 'belum-rumah' ? 'ring-2 ring-emerald-500' : '' }}" wire:click="$set('type', 'belum-rumah')">
            <p class="text-2xl font-bold text-gray-800">{{ $summary['belum-rumah'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Belum Rumah</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="flex items-center gap-3">
                <h3 class="text-base font-semibold text-gray-800">
                    @switch($type)
                        @case('surat-keluar') Surat Keluar @break
                        @case('surat-masuk') Surat Masuk @break
                        @case('sktm') SKTM @break
                        @case('belum-rumah') Belum Rumah @break
                    @endswitch
                </h3>
                <input wire:model.live="dateStart" type="date" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
                <span class="text-gray-400 text-sm">s.d.</span>
                <input wire:model.live="dateEnd" type="date" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
            </div>
            <a href="{{ route('pdf.report', $type) }}" class="inline-flex items-center px-4 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl hover:bg-emerald-700 shadow-sm hover:shadow-md transition-all duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Export PDF
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/80 text-left">
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">No</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">No. Surat</th>
                        @if(in_array($type, ['sktm', 'belum-rumah']))
                            <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Nama Pemohon</th>
                            <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">NIK</th>
                        @else
                            <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Perihal</th>
                            <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">{{ $type === 'surat-keluar' ? 'Tujuan' : 'Asal' }}</th>
                        @endif
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Tanggal</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Status</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data as $i => $d)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-5 py-4 text-gray-600">{{ $i + 1 }}</td>
                            <td class="px-5 py-4 font-medium text-gray-900">{{ $d->nomor_surat ?? $d->nik_pemohon ?? '-' }}</td>
                            @if(in_array($type, ['sktm', 'belum-rumah']))
                                <td class="px-5 py-4 text-gray-600">{{ $d->nama_pemohon ?? '-' }}</td>
                                <td class="px-5 py-4 text-gray-600">{{ $d->nik_pemohon ?? '-' }}</td>
                            @else
                                <td class="px-5 py-4 text-gray-600 max-w-xs truncate">{{ $d->perihal ?? '-' }}</td>
                                <td class="px-5 py-4 text-gray-600">{{ $d->tujuan ?? $d->asal_surat ?? '-' }}</td>
                            @endif
                            <td class="px-5 py-4 text-gray-600">{{ $d->tanggal_surat?->format('d/m/Y') }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1 bg-emerald-50 text-emerald-700 ring-emerald-600/20">{{ $d->status ?? 'active' }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1">
                                    @if($type === 'surat-keluar' && $d->nomor_surat)
                                        <a href="{{ route('pdf.surat-keluar', $d->id) }}" class="p-2 rounded-lg hover:bg-gray-100 text-emerald-600 transition-colors duration-150" title="Download PDF">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </a>
                                    @endif
                                    @if($type === 'sktm')
                                        <a href="{{ route('pdf.sktm', $d->id) }}" class="p-2 rounded-lg hover:bg-gray-100 text-emerald-600 transition-colors duration-150" title="Download PDF">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </a>
                                    @endif
                                    @if($type === 'belum-rumah')
                                        <a href="{{ route('pdf.belum-rumah', $d->id) }}" class="p-2 rounded-lg hover:bg-gray-100 text-emerald-600 transition-colors duration-150" title="Download PDF">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-sm text-gray-400">Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
