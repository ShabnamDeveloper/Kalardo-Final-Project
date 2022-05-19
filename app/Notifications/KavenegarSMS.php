<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Notifications\Channels\KavenegarChannel;
//use Kavenegar\Laravel\Channel\KavenegarChannel;

class KavenegarSMS extends Notification
{
    use Queueable;
    public $mobile;
    public $template;
    public $token;
    public $token2;
    public $token3;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mobile,$template,$token,$token2="",$token3="")
    {
        $this->mobile   = $mobile;
        $this->token    = $token;
        $this->token2   = $token2;
        $this->token3   = $token3;
        $this->template = $template;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [KavenegarChannel::class];
    }

    public function toSmS($notifiable)
    {
        return [
            'mobile'   => $this->mobile,
            'template' => $this->template,
            'token'    => $this->token,
            'token2'   => $this->token2,
            'token3'   => $this->token3,
        ];
    }
}
