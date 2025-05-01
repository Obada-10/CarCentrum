<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // De tabelnaam, in geval van een niet-standaard naam
    protected $table = 'categories';

    // De velden die massaal toewijsbaar zijn
    protected $fillable = [
        'name',
        'description',
    ];

    
}
