<?php

namespace Sebbaum\Legal\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Sebbaum\Legal\Models\Lawyer;

class PasswordUpdated extends Notification
{
    use Queueable;
    /**
     * @var Lawyer
     */
    public $lawyer;

    /**
     * Create a new notification instance.
     *
     * @param Lawyer $lawyer
     */
    public function __construct(Lawyer $lawyer)
    {
        //
        $this->lawyer = $lawyer;
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
        // TODO: implement translations
        return (new MailMessage)
            ->subject('Your password has been updated')
            ->markdown('legal::mails.passwordUpdated', ['lawyer' => $this->lawyer]);
    }
}
