<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendInvitesNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * event Instance.
     *
     * @var event
     */
    public $event;

    /**
     * Create a new notification instance.
     *
     * @return void
     *
     */
    public function __construct($event)
    {
        $this->event=$event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $this->event->user_name=$notifiable->name;
        return (new MailMessage)
            ->subject('Invite For Event')
            ->markdown('backend.emails.invites.invite', ['event' =>$this->event]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
