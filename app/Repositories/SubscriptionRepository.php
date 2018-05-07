<?php

namespace App\Repositories;
use App\Advert;
use App\Subscription;
use App\Searchable;
use DB;
use Carbon\Carbon;
use Mail;
class SubscriptionRepository 
{



    
    public function subscribable($advert){
       
        $subscriptionsQuery= DB::table('searchables')->where('searchable_type','=','App\Subscription')
        ->where( function ($query) use($advert){
            $query->where('min_price','undefined')->orWhere('min_price','<=',$advert->price);
        })
        ->where( function ($query) use($advert){
            $query->where('max_price','undefined')->orWhere('max_price','>=',$advert->price);
        })
        ->where( function ($query) use($advert){
            $query->where('state','undefined')->orWhere('state','ANY')->orWhere('state',$advert->state);
        })
        ->where( function ($query) use($advert){
            $age=Carbon::now()->subYears(intval($advert->registration_year))->year;
            $query->where('age','undefined')->orWhere('age','>=',$age);
        })
        ->where( function ($query) use($advert){
            $query->where('service','undefined')->orWhere('service','ANY')->orWhere('service',$advert->service);
        })
        ->where( function ($query) use($advert){
            $query->where('mileage','undefined')->orWhere('mileage','>=',$advert->mileage);
        })
        ->where( function ($query) use($advert){
            $query->where('fuel_type','undefined')->orWhere('fuel_type','ANY')->orWhere('fuel_type',$advert->fuel_type);
        })
        ->where( function ($query) use($advert){
            $query->where('body','undefined')->orWhere('body','ANY')->orWhere('body',$advert->body);
        })
        ->where( function ($query) use($advert){
            $query->where('transmission','undefined')->orWhere('transmission','ANY')->orWhere('transmission',$advert->transmission);
        })
        ->where( function ($query) use($advert){
            $query->where('colour','undefined')->orWhere('colour','ANY')->orWhere('colour',$advert->colour);
        })
        ->where( function ($query) use($advert){
            $query->where('doors','undefined')->orWhere('doors','10')->orWhere('doors',$advert->doors);
        })
        ->where( function ($query) use($advert){
            $query->where('consumption','undefined')->orWhere('consumption','<=',$advert->combined_consumption);
        })
        ->where( function ($query) use($advert){
            $query->where('engine_size','undefined')->orWhere('engine_size','>=',$advert->engine_size);
        })
        ->where( function ($query) use($advert){
            $query->where('seller_type','undefined')->orWhere('seller_type','any')->orWhere('seller_type',$advert->seller()->first()->sellertype);
        })
        ->where( function ($query) use($advert){
            $query->where('model','OTHER')->orWhere('model','=',$advert->model);
        })
        ->where( function ($query) use($advert){
            $query->where('make','OTHER')->orWhere('model','=',$advert->make);
        })
        ->join('subscriptions','searchables.searchable_id','subscriptions.id')
        ->join('users','subscriptions.user_id','users.id')
        ->selectRaw(' name , email , ( lat - distance*0.014)  as min_lat , (lat + distance*0.014)  as max_lat , (lng - distance*0.014)  as min_lng , (lng + distance*0.014)  as max_lng')
        ->get()
        ->where('min_lat','<=',$advert->seller()->first()->lat)
        ->where('max_lat','>=',$advert->seller()->first()->lat)
        ->where('min_lng','<=',$advert->seller()->first()->lng)
        ->where('max_lng','>=',$advert->seller()->first()->lng)
        ->unique('email')
        ;
        
        $this->sendSubscription( $subscriptionsQuery , $advert );    
    }

    public function sendSubscription($users,$advert){

        foreach($users as $user){

            Mail::to($user)->send(new \App\Mail\AdvertsSubscription($user,$advert));

        }
    }


    
}
