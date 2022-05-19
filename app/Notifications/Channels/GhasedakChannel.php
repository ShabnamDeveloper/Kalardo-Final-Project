<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;

class GhasedakChannel 
{

    public function send($notifiable,Notification $notification)
    {        
        $data = $notification->toSms($notifiable);
        $receptor = $data['mobile'];
        $template = $data['template'];
        $param1 = $data['param1'];
        $param2 = $data['param2'];
        $param3 = $data['param3'];
        $param4 = $data['param4'];
        $type = 1;        
        $api = new \Ghasedak\GhasedakApi(env('GHASEDAKAPI_KEY'));
        $api->Verify($receptor, $type, $template, $param1, $param2, $param3, $param4);
    }

}
