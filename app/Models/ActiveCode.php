<?php

namespace App\Models;
//use App\Models\ActiveCode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    protected $fillable =[
        'code',
        'mobile',
        'expired_at'
    ];

    public $timestamps = false;

    public function scopeGenerateCode($query,$phone){

        if ($code = $this->getAliveCodeForPhone($phone)) {
            $code = $code->code;

        }else{
            do {
                $code = mt_rand(10000,99999);
            } while ($this->checkCodeisUnique($code));

            ActiveCode::create([
                'code'       => $code,
                'mobile'      => $phone,
                'expired_at' => now()->addMinute(5),
            ]);
        }
        return $code;
    }

    private function getAliveCodeForPhone($phone){
        return ActiveCode::whereMobile($phone)->where('expired_at','>',now())->first();
    }

    private function checkCodeisUnique($code){
        return !! ActiveCode::whereCode($code)->first();
    }
}
