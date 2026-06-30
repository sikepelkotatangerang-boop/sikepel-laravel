<?php

namespace App\Livewire\Notification;

use App\Models\NotificationRecipient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Notifikasi')]
class Index extends Component
{
    use WithPagination;

    public $filter = '';

    public function markRead($id)
    {
        $recipient = NotificationRecipient::where('notification_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($recipient) {
            $recipient->update(['is_read' => true, 'read_at' => now()]);
        }
    }

    public function markAllRead()
    {
        NotificationRecipient::where('user_id', auth()->id())
            ->where('is_read', false)
            ->update(['is_read' => true, 'read_at' => now()]);
    }

    public function render()
    {
        $query = \App\Models\Notification::query()
            ->whereHas('recipients', fn($q) => $q->where('user_id', auth()->id()));

        if ($this->filter === 'unread') {
            $query->whereHas('recipients', fn($q) => $q->where('user_id', auth()->id())->where('is_read', false));
        }

        $notifications = $query->with(['recipients' => fn($q) => $q->where('user_id', auth()->id())])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.notification.index', compact('notifications'));
    }
}
