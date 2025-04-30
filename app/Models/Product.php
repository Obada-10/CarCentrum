<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // De velden die massaal toewijsbaar zijn
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_path',
        'category_id',
        'brand_id',
    ];

    // Relaties
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
