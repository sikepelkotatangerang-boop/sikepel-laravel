<div>
    @if (session('message'))
        <div class="mb-4 px-5 py-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-3">
            <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit="save">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-5 py-4 border-b border-gray-100">
                <h3 class="text-base font-semibold text-gray-800">Pengaturan Aplikasi</h3>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($groups as $group => $items)
                    <div class="p-5">
                        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">{{ $group }}</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @foreach($items as $item)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">{{ $item->description ?? $item->key }}</label>
                                    @if($item->type === 'textarea')
                                        <textarea wire:model="settings.{{ $item->key }}" rows="3" class="w-full border border-gray-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400"></textarea>
                                    @elseif($item->type === 'boolean')
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" wire:model="settings.{{ $item->key }}" value="1" class="sr-only peer">
                                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-600"></div>
                                            <span class="ml-3 text-sm text-gray-600">Aktif</span>
                                        </label>
                                    @else
                                        <input wire:model="settings.{{ $item->key }}" type="{{ $item->type === 'number' ? 'number' : 'text' }}" class="w-full border border-gray-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="px-5 py-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-xl shadow-sm hover:shadow-md hover:bg-emerald-700 transition-all">Simpan Pengaturan</button>
            </div>
        </div>
    </form>
</div>
