<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'shop_name',
        'bank_name',
        'shop_address',
        'shop_phone',
        'bank_account_number',
        'bank_cart_number',
        'bank_shaba_number',
        'aapproved'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function marketers(){
        return $this->hasMany(Marketer::class);
    }

    public function sellerActive(){
        return !! $this->approved;
    }
}
