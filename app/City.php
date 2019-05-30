<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = ['name', 'country_id', 'postal_code'];




    public function country(){

        return $this ->belongsTo('App\Country');
    }

    public function address(){

        return $this ->hasMany('App\Address');
    }


}
