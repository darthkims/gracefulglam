<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color')
            ->withPivot('stocks')
            ->withTimestamps();
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')
            ->withPivot('stocks')
            ->withTimestamps();
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'product_brand')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category')->withTimestamps();
    }
}

