<div>
    @if (session('message'))
        <div class="mb-4 px-5 py-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-2.5">
            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('message') }}
        </div>
    @endif
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="relative">
                <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari..." class="pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 w-64 transition-all duration-150">
            </div>
            <a href="{{ route('belum-rumah.create') }}" wire:navigate class="inline-flex items-center px-4 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl hover:bg-emerald-700 shadow-sm hover:shadow-md transition-all duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Buat Baru
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50/80 text-left">
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">No. Surat</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">NIK</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Nama</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Peruntukan</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5">Tanggal</th>
                        <th class="text-xs font-semibold uppercase tracking-wider text-gray-500 px-5 py-3.5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($documents as $doc)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-5 py-4 font-medium text-gray-900">{{ $doc->nomor_surat }}</td>
                            <td class="px-5 py-4 text-gray-600">{{ $doc->nik_pemohon }}</td>
                            <td class="px-5 py-4 text-gray-600">{{ $doc->nama_pemohon }}</td>
                            <td class="px-5 py-4 text-gray-600 max-w-xs truncate">{{ $doc->peruntukan ?? '-' }}</td>
                            <td class="px-5 py-4 text-gray-600">{{ $doc->created_at->format('d/m/Y') }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('pdf.belum-rumah', $doc->id) }}" class="p-2 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-emerald-600 transition-colors duration-150" title="Download PDF">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </a>
                                    <a href="{{ route('belum-rumah.edit', $doc->id) }}" wire:navigate class="p-2 rounded-lg hover:bg-gray-100 text-emerald-600 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <button wire:click="delete({{ $doc->id }})" onclick="return confirm('Hapus?')" class="p-2 rounded-lg hover:bg-gray-100 text-red-500 transition-colors duration-150">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
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
        @if($documents->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">{{ $documents->links() }}</div>
        @endif
    </div>
</div>
