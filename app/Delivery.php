<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'street', 'house_nr', 'bus', 'city_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
