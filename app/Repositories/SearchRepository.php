<?php

namespace App\Repositories;


use App\Http\Requests\StoreSearchable;
use DB;
use Carbon\Carbon;

class SearchRepository 
{

    protected $request;

    public function __construct(StoreSearchable $request){

        $this->request=$request;

    }

    public function search(){
        $advertQuery=DB::table('adverts');
        if(request('min_price') != 'undefined'){
            $advertQuery->where('price','>=',request('min_price')) ;
        }
        if(request('max_price') != 'undefined'){
            $advertQuery->where('price','<=',request('max_price')) ;
        }
        if(request('state') != 'undefined' && request('state') != 'ANY'){
            $advertQuery->where('state','=',request('state')) ;
        }
        if(request('age') != 'undefined'){
            $year=Carbon::now()->subYears(intval(request('age')))->year;
            $advertQuery->where('registration_year','>=',$year ) ;
        }
        if(request('service') != 'undefined' && request('service') != 'ANY'){
            $advertQuery->where('service','=',request('service')) ;
        }
        if(request('mileage') != 'undefined'){
            $advertQuery->where('mileage','<=',request('mileage')) ;
        }
        if(request('fuel_type') != 'undefined' && request('fuel_type') != 'ANY'){
            $advertQuery->where('fuel_type','=',request('fuel_type')) ;
        }
        if(request('body') != 'undefined' && request('body') != 'ANY'){
            $advertQuery->where('body','=',request('body')) ;
        }
        if(request('transmission') != 'undefined' && request('transmission') != 'ANY'){
            $advertQuery->where('transmission','=',request('transmission')) ;
        }
        if(request('colour') != 'undefined' && request('colour') != 'ANY'){
            $advertQuery->where('colour','=',request('colour')) ;
        }
        if(request('doors') != 'undefined' && request('doors') != '10'){
            $advertQuery->where('doors','=',request('doors')) ;
        }
        if(request('consumption') != 'undefined'){
            $advertQuery->where('combined_consumption','>=',request('consumption')) ;
        }
        if(request('engine_size') != 'undefined'){
            $advertQuery->where('engine_size','<=',request('engine_size')) ;
        }

        $advertQuery->join('models',function($join){
            $join->on('adverts.model_id','models.id')->when(((request('model') != 'undefined') && (request('model') != 'OTHER')),function($query){
                    return $query->where('models.model_name',request('model'));
                });
        });

        $advertQuery->join('makes',function($join){
            $join->on('models.make_id','makes.id')->when(((request('make') != 'undefined') && (request('make') != 'OTHER')),function($query){
                    return $query->where('makes.make_name',request('make'));
                });
            });
   
        $advertQuery->join('sellers',function($join){
            $join->on('adverts.seller_id','sellers.id')->when(((request('seller_type') != 'undefined') && (request('seller_type') != 'any')),function($query){
                    return $query->where('sellers.sellertype',request('seller_type'));
                })->when(((request('distance') != 'undefined') && (request('distance') != '1000')),function($query){
                    $minLat=floatval(request('lat'))-(intval(request('distance'))*0.014);
                    $maxLat=floatval(request('lat'))+(intval(request('distance'))*0.014);
                    $minLng=floatval(request('lng'))-(intval(request('distance'))*0.014);
                    $maxLng=floatval(request('lng'))+(intval(request('distance'))*0.014);

                    return $query->whereBetween('lat',[$minLat,$maxLat])->whereBetween('lng',[$minLng,$maxLng]) ;
                });
            });

        $advertQuery->join('avatars','adverts.id','avatars.advert_id');
        switch(request('sortby')){
            case 'undefined' :
                $advertQuery->orderBy('adverts.created_at', 'asc');
                break;
            case 'MOSTRECENT' :
                $advertQuery->orderBy('adverts.created_at', 'asc');
                break;                
            case 'HIGHESTPRICE' :
                $advertQuery->orderBy('price', 'desc');
                break ;   
            case 'LOWESTPRICE' :
                $advertQuery->orderBy('price', 'asc');
                break  ;
            case 'MAKE' :
                $advertQuery->orderBy('makes.make_name', 'asc');
                break; 
            case 'MODEL' :
                $advertQuery->orderBy('models.model_name', 'asc');
                break ; 
            case 'AGE' :
                $advertQuery->orderBy('registration_year', 'desc');
                break; 
            case 'MILEAGE' :
                $advertQuery->orderBy('mileage', 'asc');
                break;                                                   
        }

        $advertQuery->select('adverts.price','adverts.mileage','adverts.transmission','adverts.fuel_type','adverts.combined_consumption','adverts.variant',
            'adverts.registration_year','adverts.id','adverts.description','adverts.state','sellers.sellertype','sellers.town','avatars.path','makes.make_name',
            'models.model_name');
        
        $adverts=$advertQuery->paginate(15); 
        return $adverts;       
    }
}
