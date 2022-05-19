<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityPrice extends Model
{
    protected $fillable = ['price'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
