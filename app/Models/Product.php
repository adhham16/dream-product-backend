<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category',
        'stock_status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
