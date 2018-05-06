<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function advert(){
        return $this->belongsTo(Advert::class);
    }
}
