<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GhasedakSms extends Notification
{
    use Queueable;
    public $mobile;
    public $template;
    public $param;
    public $param2;
    public $param3;
    public $param4;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mobile, $template, $param, $param2="", $param3="", $param4="")
    {
        $this->mobile   = $mobile;
        $this->param    = $param;
        $this->param2   = $param2;
        $this->param3   = $param3;
        $this->param4   = $param4;
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
        return [GhasedakChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toSms($notifiable)
    {
        return [
            'mobile'   => $this->mobile,
            'template' => $this->template,
            'param1'   => $this->param1,
            'param2'   => $this->param2,
            'param3'   => $this->param3,
            'param4'   => $this->param4,
        ];
    }
}
