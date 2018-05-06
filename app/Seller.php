<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable=['postcode','town','county','lat','sellertype','lng','telephone','business','website','user_id'];

    protected $hidden = ['user_id', 'lat', 'lng','postcode',];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function adverts(){
        return $this->hasMany(Advert::class);
    }
}
