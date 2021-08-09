<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    public $timestamps = false;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public $primaryKey = 'id';

    public function orders(){

        return $this->hasMany('App\Models\Orders');
    }


}
