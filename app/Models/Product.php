<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function discountPrice(): Attribute
    {
        return Attribute::make(
            get: fn($value) => "₹" . $value
        );
    }
    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => "₹" . $value
        );
    }
    public function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('images/' . $value)
        );
    }
}
