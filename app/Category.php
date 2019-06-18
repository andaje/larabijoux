<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Models\BaseModel;
class Category extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = ['name'];



    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
