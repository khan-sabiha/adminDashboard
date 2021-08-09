<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{

    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
	    'customer_name',
       'customer_number',
       'pickup_location',
       'dropoff_location',
       'order_descript',
       'order_amount',
       'status',
       'customers_id',
	];

    protected $casts = [
    'created_at' => 'datetime:d/m/Y', // Change your format
    'updated_at' => 'datetime:d/m/Y',
    ];

    public $primaryKey = 'id';

     public function customers()
    {
        return $this->belongsTo('App\Models\Customers', 'customers_id');
    }   

    public function products(){

        return $this->belongsToMany('App\Models\Products')->withPivot('quantity');
    }
}
