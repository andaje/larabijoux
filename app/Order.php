<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'delivery_id', 'items', 'totalprice'
    ];

    public function orderItems(){
        return $this->hasMany('App\OrderItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function delivery(){
        return $this->belongsTo('App\Delivery');
    }
}
