<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','surname', 'email', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function seller(){
        return $this->hasOne(Seller::class);
    }

    public function adverts()
    {
        return $this->hasManyThrough(Advert::class,Seller::class);
    }  

    public function searches(){
        return $this->hasMany(Search::class);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function recents(){
        return $this->hasMany(Recent::class);
    }
}
