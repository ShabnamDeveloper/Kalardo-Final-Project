<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'persian_name',
        'english_name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'status',
        'image',
        ];

    public function brandCategories(){
        return $this->hasMany(BrandCategory::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

}
