<div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-base font-semibold text-gray-800">Notifikasi</h3>
                <select wire:model.live="filter" class="border border-gray-200 rounded-xl text-sm px-3.5 py-2 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-400 transition-all duration-150">
                    <option value="">Semua</option>
                    <option value="unread">Belum Dibaca</option>
                </select>
            </div>
            <button wire:click="markAllRead" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-150">Tandai Semua Dibaca</button>
        </div>

        <div class="divide-y divide-gray-100">
            @forelse($notifications as $n)
                @php $recipient = $n->recipients->first(); @endphp
                <div class="px-5 py-4 flex items-start gap-3 transition-colors duration-150 {{ $recipient && !$recipient->is_read ? 'bg-emerald-50/60' : '' }}">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0
                        @if($n->type === 'info') bg-blue-100
                        @elseif($n->type === 'warning') bg-amber-100
                        @else bg-red-100
                        @endif">
                        <svg class="w-4 h-4
                            @if($n->type === 'info') text-blue-600
                            @elseif($n->type === 'warning') text-amber-600
                            @else text-red-600
                            @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-800">{{ $n->title }}</p>
                        <p class="text-sm text-gray-600">{{ $n->message }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $n->created_at->diffForHumans() }}</p>
                    </div>
                    @if($recipient && !$recipient->is_read)
                        <button wire:click="markRead({{ $n->id }})" class="text-xs text-emerald-600 hover:text-emerald-700 font-medium whitespace-nowrap transition-colors duration-150">Tandai Dibaca</button>
                    @endif
                </div>
            @empty
                <div class="px-5 py-12 text-center">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <p class="text-sm text-gray-400">Belum ada data</p>
                </div>
            @endforelse
        </div>

        @if($notifications->hasPages())
            <div class="px-5 py-4 border-t border-gray-100">{{ $notifications->links() }}</div>
        @endif
    </div>
</div>
