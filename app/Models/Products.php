<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table= 'products';
    protected $fillable = [
        'product_type',
        'product_title',
        'product_desc',
        'product_location',
        'product_code', // Add product_code to fillable properties
    ];
}
