<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    public function checkSlug($slug){
        while(!Product::select('slug')->where('slug','like',$slug.'%')->get()->isEmpty()){
            $slug = Str::slug($slug, '_');
        }
        return $slug;
    }
    public static function boot(){
        parent::boot();
        static::saving(function($model){
            $model->slug = Str::slug($model->name);
        });
    }
}
