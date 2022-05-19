<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table=['order_product'];
    protected $fillable=['quantity'];
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
