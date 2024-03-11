<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['name','surname','login','email','password','tel','role_id'];

    //Поля исключения
    protected  $hidden = ['password','api_token'];

    //Необходимо обработать
    protected $casts = ['password' => 'hashed'];


    public  function hasRole($roles){
        return in_array($this->role->code, $roles);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function orders(){
        $this->hasMany(Order::class);
    }
}
