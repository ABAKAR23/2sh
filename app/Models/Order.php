<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rec_address',
        'phone',
        'user_id',
        'product_id',
        'quantity',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    
}
