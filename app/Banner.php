<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected  $primaryKey = 'id';
//    protected $fillable = [
//        'photo',
//        'status'
//    ];
    public $timestamps = false;
    //mot cate co mot hoac nhieu product
    public function getArrayInfo() {
        $res = array(
            'id' => $this->id,
            'photo' => asset('/resources/upload/'.$this->photo),
            'status' => $this->status
        );
        return $res;
    }
}
