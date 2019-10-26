<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    //
    protected $table="ChuyenMuc";
    
    public function tintuc(){
        return $this->hasMany('App\TinTuc','idTChuyenMuc','id');
    }
}
