<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function optionValues()
    {
        return $this->hasMany(Option::class);
    }

    public function productOptions()
    {
        return $this->belongsToMany(ProductOption::class);
    }
}
