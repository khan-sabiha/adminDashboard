<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [

        'p_name',
        'img',
        'p_descript',
        'categories',
        'price',
        'quantity',
    ];

    public $primaryKey = 'id';

    public function orders(){

        return $this->belongsToMany('App\Models\Orders')->withPivot('quantity');
    }
}