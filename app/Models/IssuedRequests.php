<?php

namespace App\Models;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedRequests extends Model
{
    use HasFactory;
    protected $table  = 'issuedrequests';
    protected $fillable = [
        'sfname',
        'semail',
        'sdept',
        'srollno',
        'product_code',
        'reqdevboard',
        'reqequipment', // Add product_code to fillable properties
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'reqdevboard', 'id');
    }
    public function equipmentProduct()
    {
        return $this->belongsTo(Products::class, 'reqequipment', 'id');
    }
}
