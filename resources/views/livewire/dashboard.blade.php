<div>
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @foreach([
            ['label' => 'Surat Keluar', 'value' => $totalSuratKeluar, 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'indigo', 'bg' => 'bg-indigo-50', 'route' => 'surat-keluar.index'],
            ['label' => 'Surat Masuk', 'value' => $totalSuratMasuk, 'icon' => 'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4', 'color' => 'emerald', 'bg' => 'bg-emerald-50', 'route' => 'surat-masuk.index'],
            ['label' => 'SKTM', 'value' => $totalSKTM, 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'amber', 'bg' => 'bg-amber-50', 'route' => 'sktm.index'],
            ['label' => 'Belum Rumah', 'value' => $totalBelumRumah, 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'color' => 'violet', 'bg' => 'bg-violet-50', 'route' => 'belum-rumah.index'],
        ] as $stat)
            <a href="{{ route($stat['route']) }}" wire:navigate class="block">
                <div class="bg-white rounded-2xl border border-slate-100 p-5 shadow-sm hover:shadow-md hover:border-slate-200 transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-slate-900 mt-1">{{ $stat['value'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl {{ $stat['bg'] }} flex items-center justify-center">
                            <svg class="w-6 h-6 text-{{ $stat['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Surat Masuk Terbaru --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Surat Masuk Terbaru</h3>
                    <a href="{{ route('surat-masuk.index') }}" wire:navigate class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Lihat Semua</a>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse($suratMasukTerbaru as $sm)
                        <div class="px-6 py-4 flex items-center justify-between hover:bg-slate-50/50 transition-colors">
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-slate-900 truncate">{{ $sm->nomor_surat ?? '-' }}</p>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $sm->asal_surat }} &middot; {{ $sm->tanggal_surat?->format('d/m/Y') }}</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($sm->status === 'pending') bg-amber-50 text-amber-700 ring-1 ring-amber-200
                                @elseif($sm->status === 'diproses') bg-blue-50 text-blue-700 ring-1 ring-blue-200
                                @else bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200
                                @endif">
                                {{ $sm->status }}
                            </span>
                        </div>
                    @empty
                        <div class="px-6 py-10 text-center">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-sm text-slate-500">Belum ada surat masuk</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Aktivitas Terbaru --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm h-full">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Aktivitas Terbaru</h3>
                </div>
                <div class="divide-y divide-slate-100 p-4">
                    @forelse($aktivitasTerbaru as $akt)
                        <div class="py-3 flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0
                                @if($akt['type'] === 'surat_keluar') bg-indigo-100 text-indigo-600
                                @elseif($akt['type'] === 'surat_masuk') bg-emerald-100 text-emerald-600
                                @else bg-amber-100 text-amber-600
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
                                <p class="text-sm text-slate-800">{{ $akt['label'] }}</p>
                                <p class="text-xs text-slate-500 mt-0.5 truncate">{{ $akt['message'] }}</p>
                                <p class="text-xs text-slate-400 mt-1">{{ $akt['time']->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="py-10 text-center">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm text-slate-500">Belum ada aktivitas</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>