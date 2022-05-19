<?php

namespace App\Models;

use App\Models\Address;
use App\Models\CityPrice;
use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name',
        'state_id'
    ];


    public function transports(){

        return $this->belongsToMany(Transport::class);

    }
    public function prices(){

        return $this->hasMany(CityPrice::class);

    }
    public function addresses(){
        return $this->belongsToMany(Address::class);

    }
}
