<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shops";

    public function category(){
        return $this->belongsTo('App\Models\ShopCategory', 'shop_category_id');
    }
    
}