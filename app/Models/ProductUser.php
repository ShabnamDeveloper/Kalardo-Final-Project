<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    protected $fillable = [
        'user_id' ,
        'product_id' ,
        'state_id',
        'brand_id' ,
        'city_id',
        'price',
        'inventory',
        'approved',
        'minimum'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function City()
    {
        return $this->belongsTo(City::class);
    }
    public function State()
    {
        return $this->belongsTo(State::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
