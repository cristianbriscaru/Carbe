<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Route;
class UpdateAdvert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $advertId=Route::current()->parameter('advert')->id;
        return [
            'vrm'=>'required|string|min:6|max:7|alpha_num|unique:adverts,vrm,'.$advertId,
            'price'=>'required|numeric|min:1|max:50000000',
            'mileage'=>'required|numeric|min:0|max:5000000',
            'state'=>'required|in:USED,NEW,NEARLYNEW',
            'variant'=>'required|string|min:1|max:255',
            'body'=>'required|in:SALOON,HATCHBACK,PICKUP,COUPE,SUV,ESTATE,CONVERTIBLE,MPV,OTHER',
            'transmission'=>'required|in:MANUAL,AUTOMATIC,SEMIAUTOMATIC,CVT,OTHER',
            'fuel_type'=>'required|in:PETROL,DIESEL,ELECTRIC,DIESEL/ELECTRIC,PETROL/ELECTRIC,OTHER',
            'colour'=>'required|in:BEIGE,BLACK,BLUE,BRONZE,BROWN,BURGUNDY,GOLD,GREEN,GREY,INDIGO,MAGENTA,MAROON,MULTICOLOUR,NAVY,ORANGE,PINK,PURPLE,RED,SILVER,TURQUOISE,WHITE,YELLOW,OTHER',
            'doors'=>'required|numeric|min:2|max:5',
            'seats'=>'required|numeric|min:1|max:50',
            'registration_year'=>'required|numeric|min:1900|max:2018',
            'engine_size'=>'required|numeric|min:10|max:20000',
            'emissions'=>'required|numeric|min:0|max:2000',
            'power'=>'required|numeric|min:1|max:2000',
            'urban_consumption'=>'required|numeric|min:0|max:1000',
            'combined_consumption'=>'required|numeric|min:0|max:1000',
            'motorway_consumption'=>'required|numeric|min:0|max:1000',
            'description'=>'required|string|min:25|max:1000',
            'service'=>'required|in:FULL,PART,NONE',
            'owners'=>'required|numeric|min:0|max:100',
            'tax'=>'required|numeric|min:0|max:1000',
            'euro'=>'required|numeric|min:0|max:6',
            'make'=> 'required|string|exists:makes,make_name',
            'model'=> 'required|string|exists:models,model_name',
            'features.*'=>'numeric|min:1|max:27',
            
        ];
    }
}
