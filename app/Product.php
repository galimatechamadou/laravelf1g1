<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo("App\Category");
    }

    //belongToMany(class)
    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function seller(){
        return $this->belongsTo(\App\Seller::class);
    }
}
