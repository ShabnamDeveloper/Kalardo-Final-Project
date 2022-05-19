<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'image',
        'meta_description',
        'description',
        'parent_id',
        'status',
        'category_id'
    ];

    public function children()
    {
        return $this->hasMany(Self::class, 'parent_id', 'id');
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
