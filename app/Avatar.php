<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $guarded = [];

    public $timestamps = false;
    
    public function advert(){
        return $this->belongsTo(Advert::class);
    }
}