<?php

namespace Sebbaum\Legal\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Sebbaum\Legal\Models\Lawyer;

class NotifyLawyer extends Notification
{
    use Queueable;

    /**
     * @var Lawyer
     */
    public $lawyer;

    /**
     * @var String
     */
    public $password;

    /**
     * Create a new notification instance.
     *
     * @param Lawyer $lawyer
     * @param $password
     */
    public function __construct(Lawyer $lawyer, $password)
    {
        $this->lawyer = $lawyer;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // TODO: implement translations
        $appname = config('app.name');
        return (new MailMessage)
            ->subject("Lawyer registration to {$appname}")
            ->markdown('legal::mails.lawyerCreated', ['lawyer' => $this->lawyer, 'password' => $this->password]);
    }
}
