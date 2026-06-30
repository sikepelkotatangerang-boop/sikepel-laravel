<div>
    @if (session('message'))
        <div class="mb-4 px-4 py-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari surat..." class="pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl text-sm w-72 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:outline-none transition-shadow">
                </div>
                <select wire:model.live="jenisFilter" class="border border-gray-300 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:outline-none transition-shadow">
                    <option value="">Semua Jenis</option>
                    @foreach($jenisList as $j)
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('surat-keluar.create') }}" wire:navigate class="inline-flex items-center px-4 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl hover:bg-emerald-700 active:bg-emerald-800 transition-colors shadow-sm hover:shadow-md">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Buat Surat Baru
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/80 text-left">
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">No. Surat</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Jenis</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Perihal</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Tujuan</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Tanggal</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 font-semibold text-gray-600 text-xs uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($documents as $doc)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="px-5 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $doc->nomor_surat }}</td>
                            <td class="px-5 py-4 text-gray-600 whitespace-nowrap">{{ $doc->jenis_dokumen }}</td>
                            <td class="px-5 py-4 text-gray-600 max-w-xs truncate">{{ $doc->perihal }}</td>
                            <td class="px-5 py-4 text-gray-600 whitespace-nowrap">{{ $doc->tujuan ?? '-' }}</td>
                            <td class="px-5 py-4 text-gray-600 whitespace-nowrap">{{ $doc->tanggal_surat->format('d/m/Y') }}</td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'Draft'    => 'bg-gray-100 text-gray-700',
                                        'Dikirim'  => 'bg-blue-50 text-blue-700',
                                        'Diproses' => 'bg-amber-50 text-amber-700',
                                        'Selesai'  => 'bg-emerald-50 text-emerald-700',
                                        'Ditolak'  => 'bg-red-50 text-red-700',
                                    ];
                                    $badgeClass = $statusColors[$doc->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                                    {{ $doc->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('pdf.surat-keluar', $doc->id) }}" class="p-2 text-gray-400 hover:text-emerald-600 hover:bg-emerald-50/50 rounded-lg transition-colors" title="Download PDF">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </a>
                                    <a href="{{ route('surat-keluar.edit', $doc->id) }}" wire:navigate class="p-2 text-emerald-600 hover:text-emerald-800 hover:bg-emerald-50/50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <button wire:click="delete({{ $doc->id }})" onclick="return confirm('Hapus surat ini?')" class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50/50 rounded-lg transition-colors" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    <span class="text-gray-400 text-sm">Belum ada surat keluar</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($documents->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">
                {{ $documents->links() }}
            </div>
        @endif
    </div>
</div>
