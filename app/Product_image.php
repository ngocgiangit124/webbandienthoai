<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'product_images';
    protected  $primaryKey = 'id';
    protected $fillable = ['image', 'product_id'];

    public function product () {
    	return $this->belongTo('App\Product');
    }
}
