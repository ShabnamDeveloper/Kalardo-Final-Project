<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $fillable = [
        'name',
        'status',
        'location'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
