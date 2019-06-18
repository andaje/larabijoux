<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable=['photo_id','category_id','name','title','description','price'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function stock(){
        return $this->hasMany('App\Stock');
    }
    public function order(){
        return $this->belongsToMany('App\Order', 'order_product', 'product_id', 'order_id');
    }

}
