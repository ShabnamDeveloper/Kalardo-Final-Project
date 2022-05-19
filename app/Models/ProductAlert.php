<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAlert extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'description',
        'title',
        'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
