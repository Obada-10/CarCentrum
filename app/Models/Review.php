<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    /**
     * Relatie naar de gebruiker die de review heeft geschreven
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relatie naar het product dat beoordeeld wordt
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
