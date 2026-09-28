<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function index(Request $request)
    {
        abort_unless($request->user()->type === 'Admin', 403);

        return view('user.notifications', [
            'notifications' => $request->user()
                ->notifications()
                ->latest()
                ->paginate(20),
        ]);
    }

    public function markAsRead(Request $request, string $notification)
    {
        abort_unless($request->user()->type === 'Admin', 403);

        $notification = $request->user()
            ->notifications()
            ->where('id', $notification)
            ->firstOrFail();

        $notification->markAsRead();

        return back();
    }

    public function markAllAsRead(Request $request)
    {
        abort_unless($request->user()->type === 'Admin', 403);

        $request->user()->unreadNotifications->markAsRead();

        return back();
    }

    public function destroy(string $notification)
    {
        auth()->user()
            ->notifications()
            ->where('id', $notification)
            ->delete();

        return back()->with('success', 'Notification deleted successfully.');
    }
}
