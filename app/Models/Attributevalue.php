<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributevalue extends Model
{
    use HasFactory;

    public function attributegroup()
    {
        return $this->belongsTo(Attributegroup::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
