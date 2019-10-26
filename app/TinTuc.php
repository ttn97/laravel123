<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table="TinTuc";

    public function chuyenmuc(){
        return $this->belongsTo('App\ChuyenMuc','idChuyenMuc','id');
    }

    public function comment(){
        return $this->hasMany('App\Comment','idTinTuc','id');
    }
}

