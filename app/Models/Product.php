<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class)->withPivot('IsAsli');
    }

    public function attributevalues()
    {
        return $this->belongsToMany(Attributevalue::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
