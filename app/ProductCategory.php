<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "category_products";

    public function product_type(){
        return $this->hasMany('App\ProductType','id_category','id');
    }

    public function product(){
        return $this->hasMany('App\Product','App\ProductType','id_category','id_type','id');
    }


}
