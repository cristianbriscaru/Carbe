<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $guarded = [];
    
    public $timestamps = false;
    
    public function make(){
        return $this->belongsTo(Make::class);
    }

    public function adverts(){
        return $this->hasMany(Advert::class);
    }

    public function searchables(){
        return $this->hasMany(Searchable::class);
    }
}
