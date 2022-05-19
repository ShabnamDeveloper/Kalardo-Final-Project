<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
     use HasFactory;

    public $fillable = [
        'category_id',
        'brand_id',
        'description',
        'meta_title',
        'meta_description',
        'status'
    ];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
