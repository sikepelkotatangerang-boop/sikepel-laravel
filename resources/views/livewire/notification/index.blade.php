<div>
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <h3 class="text-sm font-semibold text-slate-700 uppercase tracking-wider">Notifikasi</h3>
                <select wire:model.live="filter" class="border border-slate-200 rounded-xl text-sm px-3 py-2 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 bg-white transition-all">
                    <option value="">Semua</option>
                    <option value="unread">Belum Dibaca</option>
                </select>
            </div>
            <button wire:click="markAllRead" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors">Tandai Semua Dibaca</button>
        </div>

        <div class="divide-y divide-slate-100">
            @forelse($notifications as $n)
                @php $recipient = $n->recipients->first(); @endphp
                <div class="px-6 py-4 flex items-start gap-3 {{ $recipient && !$recipient->is_read ? 'bg-indigo-50/50' : '' }} hover:bg-slate-50/50 transition-colors">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0
                        @if($n->type === 'info') bg-blue-100 text-blue-600
                        @elseif($n->type === 'warning') bg-amber-100 text-amber-600
                        @else bg-red-100 text-red-600
                        @endif">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-900">{{ $n->title }}</p>
                        <p class="text-sm text-slate-600 mt-0.5">{{ $n->message }}</p>
                        <p class="text-xs text-slate-400 mt-1">{{ $n->created_at->diffForHumans() }}</p>
                    </div>
                    @if($recipient && !$recipient->is_read)
                        <button wire:click="markRead({{ $n->id }})" class="text-xs font-medium text-indigo-600 hover:text-indigo-700 whitespace-nowrap">Tandai Dibaca</button>
                    @endif
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <p class="text-slate-500">Tidak ada notifikasi</p>
                </div>
            @endforelse
        </div>

        @if($notifications->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">{{ $notifications->links() }}</div>
        @endif
    </div>
</div>