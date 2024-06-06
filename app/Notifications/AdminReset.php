<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Otp;
class AdminReset extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $fromEmail;
    public $mailer;
    public $otp;
   

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
 

        $this->message='Use the code bellow to reset the password';
             $this->subject='Verication needed';
             $this->fromEmail='cnps@gmail.com';
             $this->mailer='smtp';
             $this->otp=new Otp;
    
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

        $Otp=$this->otp->generate($notifiable->email,'numeric',6,70);
        return (new MailMessage)
        ->mailer('smtp')
        ->subject($this->subject)
        ->line('From '.$this->fromEmail)
        ->greeting('Hello '.$notifiable->first_name)
        ->line($this->message)
        ->line('code: '. $Otp->token)
        ->line('The following code will expire in 60 seconds');
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