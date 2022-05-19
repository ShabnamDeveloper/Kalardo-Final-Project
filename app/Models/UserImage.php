<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'national_card_image_front',
        'national_card_image_back',
        'birth_certificate',
        'business_certificate',
        'medical_license',
        'present_mobile_image',
        'postcode_image',
        'checkbook_image',
        'address_image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
