<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'supportable_id',
        'supportable_type',
        'subject',
        'status_id',
        'text',
        'parent_id',
        'approved',
        'part_id',
        'priority'
    ];

    public function supportable(){
        return $this->morphTo();
    }

    public function child(){
        return $this->hasMany(Support::class,'parent_id','id');
    }
}
