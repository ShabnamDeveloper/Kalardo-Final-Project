<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable = ['value'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
