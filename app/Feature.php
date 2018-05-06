<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public $timestamps = false;

    public function features(){
        return $this->belongsToMany(Advert::class);
    }    
}
