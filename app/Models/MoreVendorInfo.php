<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreVendorInfo extends Model
{
    protected $fillable = [
        'description',
        'shipping_terms',
        'return_terms',
        'free_shipping_threshold',
        'near_shipping_price',
        'far_shipping_price'
    ];

    public function user(){
        return $this->BelongsTo(User::class);

    }
}
