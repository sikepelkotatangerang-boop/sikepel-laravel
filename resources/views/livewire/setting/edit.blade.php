<div>
    @if (session('message'))
        <div class="mb-6 px-4 py-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-2 animate-slide-in">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="save" class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Pengaturan Aplikasi</h3>
        </div>
        <div class="p-6 space-y-8">
            @foreach($groups as $group => $items)
                <div>
                    <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-4">{{ $group }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($items as $item)
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">{{ $item->description ?? $item->key }}</label>
                                @if($item->type === 'textarea')
                                    <textarea wire:model="settings.{{ $item->key }}" rows="3" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all"></textarea>
                                @elseif($item->type === 'boolean')
                                    <label class="inline-flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" wire:model="settings.{{ $item->key }}" value="1" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                        <span class="text-sm text-slate-600">Aktif</span>
                                    </label>
                                @else
                                    <input wire:model="settings.{{ $item->key }}" type="{{ $item->type === 'number' ? 'number' : 'text' }}" class="w-full border border-slate-200 rounded-xl text-sm px-3 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 transition-all">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="px-6 py-4 border-t border-slate-100 flex justify-end">
            <button type="submit" class="px-4 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors">Simpan Pengaturan</button>
        </div>
    </form>
</div>