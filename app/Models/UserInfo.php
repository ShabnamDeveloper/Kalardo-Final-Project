<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'image',
        'favorite_color',
        'shaba',
        'bank_shaba',
        'bank_title',
        'bank_shaba_at',
        'imed_user_type',
        'birth_day',
        'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
