@extends('layouts.adminmaster')

@section('admin')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Notifications</h2>

            <form action="{{ route('admin.notifications.readAll') }}"
                  method="POST">
                @csrf

                <button type="submit" class="btn btn-secondary">
                    Mark all as read
                </button>
            </form>
        </div>

      @forelse($notifications as $notification)
    <div class="notification-item
        {{ is_null($notification->read_at) ? 'unread' : '' }}">

        <p>
            {{ $notification->data['message'] ?? 'Notification' }}
        </p>

        <small>
            {{ $notification->created_at->diffForHumans() }}
        </small>

        <div class="mt-2">
            @if(is_null($notification->read_at))
                <form action="{{ route('admin.notifications.read', $notification->id) }}"
                      method="POST"
                      class="d-inline">
                    @csrf

                    <button type="submit" class="btn btn-sm btn-primary">
                        Mark as read
                    </button>
                </form>
            @endif

            <form action="{{ route('admin.notifications.delete', $notification->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Delete this notification?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>
@empty
    <p>No notifications found.</p>
@endforelse

        {{ $notifications->links() }}
    </div>
@endsection