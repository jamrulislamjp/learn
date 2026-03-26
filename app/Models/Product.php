<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    // You can also add relationships, accessors, mutators, etc. here
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];
}
