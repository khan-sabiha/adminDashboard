<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    use HasFactory;

    protected $table = 'orders_products';
     protected $fillable = [
         'orders_id',
         'products_id',
         'total',
         'quantity',
         'status',
     ];
}
