<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id' , 'address_id','is_active'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function deliveries(){
        return $this->belongsToMany('App\Delivery')->latest();
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }


    public function isAdmin()
    {
        if ($this->role->name == 'Administrator' && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    /*public function isActive(){
        if($this->is_active == 1){
            return true;
        }else{
            return false;
        }
    }*/
}
