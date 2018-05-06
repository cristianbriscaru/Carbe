<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSearchable extends FormRequest
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
        return [
            'postcode'=>'required|string|min:5|max:7|alpha_num',
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'distance'=>'in:undefined,1000,1,5,10,20,30,40,50,75,100,150,200,500' ,           
            'min_price'=>'in:undefined,0,1,500,1000,2000,3000,4000,5000,6000,7000,8000,9000,10000,
                        12500,15000,17500,20000,25000,30000,35000,40000,45000,50000,55000,60000,75000,100000,250000,500000,1000000',
            'max_price'=>'in:undefined,50000000,1,500,1000,2000,3000,4000,5000,6000,7000,8000,9000,10000,
                        12500,15000,17500,20000,25000,30000,35000,40000,45000,50000,55000,60000,75000,100000,250000,500000,1000000',
            'state'=>'in:undefined,ANY,USED,NEW,NEARLYNEW',
            'age'=>'in:undefined,150,1,2,3,4,5,6,7,8,9,10,15,20',
            'service'=>'in:undefined,ANY,FULL,PART,NONE',
            'mileage'=>'in:undefined,5000000,0,100,500,5000,10000,15000,20000,25000,30000,35000,40000,45000,50000,60000,70000,80000,90000,100000,125000,150000,200000',
            'fuel_type'=>'in:undefined,ANY,PETROL,DIESEL,ELECTRIC,DIESEL/ELECTRIC,PETROL/ELECTRIC',
            'body'=>'in:undefined,ANY,SALOON,HATCHBACK,PICKUP,COUPE,SUV,ESTATE,CONVERTIBLE,MPV',
            'transmission'=>'in:undefined,ANY,MANUAL,AUTOMATIC,SEMIAUTOMATIC,CVT',
            'colour'=>'in:undefined,ANY,BEIGE,BLACK,BLUE,BRONZE,BROWN,BURGUNDY,GOLD,GREEN,GREY,INDIGO,MAGENTA,MAROON,MULTICOLOUR,NAVY,ORANGE,PINK,PURPLE,RED,SILVER,TURQUOISE,WHITE,YELLOW,OTHER',
            'doors'=>'in:undefined,2,3,4,5,10',
            'consumption'=>'in:undefined,25,50,75,100,1000',
            'seller_type'=>'in:undefined,any,private,trader',
            'engine_size'=>'in:undefined,20000,1000,1500,1700,2000,2500,3000',
            'make'=> 'required|string|exists:makes,make_name',
            'model'=> 'required|string|exists:models,model_name',
            'sortby'=> 'in:undefined,HIGHESTPRICE,LOWESTPRICE,MOSTRECENT,MAKE,MODEL,AGE,MILEAGE'           
        ];
    }
}
