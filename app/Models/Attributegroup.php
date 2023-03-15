<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributegroup extends Model
{
    use HasFactory;

    public function attributevalues()
    {
        return $this->hasMany(Attributevalue::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
