<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable=['photo_id','name','title','description','price'];

    public function category(){
        return $this->belongsToMany('App\Category');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function stock(){
        return $this->hasMany('App\Stock');
    }
}
