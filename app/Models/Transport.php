<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];


    public function cities(){

        return $this->belongsToMany(City::class)->withPivot('price_id');

    }
}
