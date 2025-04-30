<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // De velden die massaal toewijsbaar zijn
    protected $fillable = [
        'name',
    ];

    // Als je geen timestamps wilt gebruiken, zet je dit op false
    // public $timestamps = false;
}
