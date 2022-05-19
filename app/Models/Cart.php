<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'session_id',
        'user_id'
    ];

    public function user()
    {
        $this->hasOne(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products')->withPivot('number')->withTimestamps();
    }

}
