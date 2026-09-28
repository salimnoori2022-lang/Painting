<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AdminActivityNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Notification;

class SendAdminLoginNotification
{
    /**
     * Create the event listener.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;

        // Do not notify admins when an admin logs in
        if ($user->type === 'Admin') {
            return;
        }

        $admins = User::where('type', 'Admin')->get();

        Notification::send(
            $admins,
            new AdminActivityNotification(
                $user->name.' logged into the website.',
                route('admin.notifications.index')
            )
        );
    }

    public function __construct() {}

    /**
     * Handle the event.
     */
}
