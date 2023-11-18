<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameproduct',
        'content',
        'menu_id',
        'price',
        'hinhanhproduct',
        'soluong',
        'color',
        'size'
    ];
    
}
