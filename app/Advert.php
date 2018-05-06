<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $guarded = [];

    protected $hidden = ['seller_id','vrm','model_id','id','created_at','updated_at'];

    

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function features(){
        return $this->belongsToMany(Feature::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function model(){
        return $this->belongsTo(Models::class);
    }

    public function avatar(){
        return $this->hasOne(Avatar::class);
    }   
    
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    
    public function recents(){
        return $this->hasMany(Recent::class);
    }
}
