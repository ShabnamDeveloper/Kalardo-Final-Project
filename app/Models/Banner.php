<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'status',
        'location'
    ];

    public function bannerImages(){
        return $this->hasMany(BannerImage::class);
    }
}
