<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    //Поля необходимые для создание
    protected $fillable = ['name'];

    //Поля исключения
    protected  $hidden = [];


    public function users(){
        return $this->hasMany(User::class);
    }
}
