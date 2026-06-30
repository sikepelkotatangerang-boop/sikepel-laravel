<div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="flex flex-wrap items-center gap-3">
                <div class="relative">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nomor, perihal, nama..." class="pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 w-72 transition-all duration-150">
                </div>
                <select wire:model.live="jenisFilter" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
                    <option value="">Semua Jenis</option>
                    <option value="surat-keluar">Surat Keluar</option>
                    <option value="surat-masuk">Surat Masuk</option>
                    <option value="sktm">SKTM</option>
                    <option value="belum-rumah">Belum Rumah</option>
                </select>
                <input wire:model.live="dateStart" type="date" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
                <span class="text-gray-400 text-sm">s.d.</span>
                <input wire:model.live="dateEnd" type="date" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/80 text-left">
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">No. Surat</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Jenis</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Perihal</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Subjek/Tujuan</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Tanggal</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($results as $doc)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-5 py-4 font-medium text-gray-900">{{ $doc['nomor_surat'] }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1
                                    @if($doc['source'] === 'surat-keluar') bg-blue-50 text-blue-700 ring-blue-600/20
                                    @elseif($doc['source'] === 'surat-masuk') bg-purple-50 text-purple-700 ring-purple-600/20
                                    @elseif($doc['source'] === 'sktm') bg-amber-50 text-amber-700 ring-amber-600/20
                                    @else bg-cyan-50 text-cyan-700 ring-cyan-600/20
                                    @endif">
                                    {{ $doc['source_label'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-gray-600 max-w-xs truncate">{{ $doc['perihal'] }}</td>
                            <td class="px-5 py-4 text-gray-600">{{ $doc['subjek'] }}</td>
                            <td class="px-5 py-4 text-gray-600">{{ \Carbon\Carbon::parse($doc['tanggal_surat'])->format('d/m/Y') }}</td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1
                                    @if($doc['status'] === 'active') bg-emerald-50 text-emerald-700 ring-emerald-600/20
                                    @else bg-gray-50 text-gray-700 ring-gray-600/20
                                    @endif">
                                    {{ $doc['status'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                <p class="text-sm text-gray-400">Belum ada data</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($results->count() >= 100)
            <div class="px-5 py-4 border-t border-gray-100 text-center text-sm text-gray-500">
                Menampilkan hingga 100 hasil. Persempit pencarian untuk hasil lebih spesifik.
            </div>
        @endif
    </div>
</div>
