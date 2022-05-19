<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPage extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'slug',
            'status',
            'meta_title',
            'meta_description',
            'description'
        ];
}
