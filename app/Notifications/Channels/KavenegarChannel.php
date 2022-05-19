<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Kavenegar\Laravel\Message\KavenegarMessage;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Kavenegar;

class KavenegarChannel 
{

    public function send($notifiable,Notification $notification)
    {        
        $data = $notification->toSmS($notifiable);

        $token    =  $data['token'];
        $token2   =  $data['token2'];
        $token3   =  $data['token3'];
        $receptor =  $data['mobile'];
        $template =  $data['template'];
        $result = Kavenegar::VerifyLookup($receptor,$token,$token2,$token3,$template);
    }

}
