<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'type',
        'category',
        'price',
        'release_year',
        'stock',
        'description'
    ];
}
