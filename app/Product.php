<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'alias',
        'price',
        'price_new',
        'status',
        'intro',
        'content',
        'image',
        'keywords',
        'description',
        'user_id',
        'cate_id',
        'screen',
        'camera1',
        'camera2',
        'ram',
        'rom',
        'cpu',
        'gpu',
        'battery_capacity',
        'operating_system',
        'sim',
        'origin'
    ];
    public function getArrayInfo1() {
        $res = array(
            'id'=>$this->id,
            'name'=>$this->name,
            'alias'=>$this->alias,
            'price'=>$this->price,
            'price_new'=>$this->price_new,
            'status'=>$this->status,
            'intro'=>$this->intro,
            'content'=>$this->content,
            'image'=>$this->image,
            'keywords'=>$this->keywords,
            'description'=>$this->description,
            'user_id'=>$this->user_id,
            'cate_id'=>$this->cate_id,
            'screen'=>$this->screen,
            'camera1'=>$this->camera1,
            'camera2'=>$this->camera2,
            'ram'=>$this->rom,
            'rom'=>$this->name,
            'cpu'=>$this->cpu,
            'gpu'=>$this->gpu,
            'battery_capacity'=>$this->battery_capacity,
            'operating_system'=>$this->operating_system,
            'sim'=>$this->sim,
            'origin'=>$this->origin
        );
        return $res;
    }
    //public $timestamps = false;

    //mot product chi thuoc 1 cate
    public function category () {
    	return $this->belongTo('App\Category');
    }
    //mot product chi duoc tao boi 1 user
    public function user () {
    	return $this->belongTo('App\User');
    }
    //mot product co 1 or nhieu img
    public function product_image () {
        return $this->hasMany('App\Product_image');
    }
    //mot product co 1 hoac nhieu order detail
    public function order_detail () {
        return $this->hasMany('App\Order_detail');
    }

    public function product_size () {
        return $this->hasMany('App\Product_size');
    }
    public function getArrayInfo() {
        $res = array(
            'id' => $this->id,
            'photo' => asset('/resources/upload/'.$this->photo),
            'status' => $this->status
        );
        return $res;
    }
}
