<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['price','name','description','photo','mass','quantity','category_id'];

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orderlists(){
        return $this->hasMany(OrderList::class);
    }
    public function file(){
        return $this->belongsTo(File::class);
    }
}
