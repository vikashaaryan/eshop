<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function parent(){
        return $this->hasOne(Category::class, "id", "category_id");
    }
   

    public function catTitle(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucwords($value),
            get: fn($value) => ucwords($value),
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }
}
