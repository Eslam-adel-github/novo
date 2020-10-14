<?php

namespace App\Listeners;

use App\Events\SendInvitEnvent;
use App\Notifications\SendInvitesNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendInviteListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SendInvitEnvent  $event
     * @return void
     */
    public function handle(SendInvitEnvent $event)
    {
        Notification::send($event->users,new SendInvitesNotification($event->event));
        /*
        foreach ($event->users as $user) {
            $user->notify(new SendInvitesNotification($event->event));
        }
        */
    }
}
