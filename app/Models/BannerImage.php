<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BannerImage extends Model
{
    protected $fillable = [
        'images',
        'url'
    ];

    public function banner(){
        return $this->belongsTo(Banner::class);
    }
}
