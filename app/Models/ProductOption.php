<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
//    use HasFactory;
    protected $fillable = [
        'product_id',
        'option_id',
        'value_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function optionvalues()
    {
        return $this->belongsToMany(OptionValue::class);
    }

}
