<?php

namespace App\Repositories;

use App\Advert;

class RecentRepository 
{
    public function addRecent (Advert $advert){
        if(auth()->check()){
            
            auth()->user()->recents()->firstOrCreate(['advert_id' => $advert->id]);
            
            if(auth()->user()->recents()->count() > 5){

                auth()->user()->recents()->first()->delete();    
            }
        }
    }
}
