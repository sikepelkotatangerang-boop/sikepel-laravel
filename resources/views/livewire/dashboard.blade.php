<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="group bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 p-6 transition-all duration-200 hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Surat Keluar</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSuratKeluar }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center shadow-md shadow-emerald-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 p-6 transition-all duration-200 hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Surat Masuk</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSuratMasuk }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-400 to-blue-600 flex items-center justify-center shadow-md shadow-blue-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 p-6 transition-all duration-200 hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total SKTM</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalSKTM }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-300 to-green-600 flex items-center justify-center shadow-md shadow-emerald-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-xl shadow-sm hover:shadow-md border border-gray-100 p-6 transition-all duration-200 hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">SK Belum Rumah</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalBelumRumah }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-400 to-purple-600 flex items-center justify-center shadow-md shadow-violet-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Surat Masuk Terbaru</h3>
                <a href="{{ route('surat-masuk.index') }}" wire:navigate class="text-sm font-medium text-emerald-600 hover:text-emerald-700 transition-colors">Lihat Semua &rarr;</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($suratMasukTerbaru as $sm)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-gray-50/50 transition-colors">
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ $sm->nomor_surat ?? '-' }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $sm->asal_surat }} &middot; {{ $sm->tanggal_surat?->format('d/m/Y') }}</p>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($sm->status === 'pending') bg-amber-50 text-amber-700 ring-1 ring-amber-600/20
                            @elseif($sm->status === 'diproses') bg-blue-50 text-blue-700 ring-1 ring-blue-600/20
                            @else bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20
                            @endif">
                            {{ $sm->status }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        <p class="text-sm text-gray-400">Belum ada surat masuk</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">Aktivitas Terbaru</h3>
                <span class="inline-flex items-center gap-1 text-xs text-gray-400">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Live
                </span>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($aktivitasTerbaru as $akt)
                    <div class="px-6 py-4 flex items-start gap-4 hover:bg-gray-50/50 transition-colors">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5
                            @if($akt['type'] === 'surat_keluar') bg-gradient-to-br from-emerald-100 to-emerald-200 text-emerald-600
                            @elseif($akt['type'] === 'surat_masuk') bg-gradient-to-br from-cyan-100 to-blue-200 text-blue-600
                            @else bg-gradient-to-br from-emerald-100 to-green-200 text-green-600
                            @endif">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                @if($akt['type'] === 'surat_keluar')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                @elseif($akt['type'] === 'surat_masuk')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                @endif
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-gray-800">{{ $akt['label'] }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $akt['message'] }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $akt['time']->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-sm text-gray-400">Belum ada aktivitas</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
