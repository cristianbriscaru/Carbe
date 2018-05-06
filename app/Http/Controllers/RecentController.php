<?php

namespace App\Http\Controllers;

use App\Recent;
use Illuminate\Http\Request;

class RecentController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $recents=auth()->user()->recents()->join('adverts','recents.advert_id','adverts.id')->join('models','adverts.model_id','models.id')
        ->join('makes','models.make_id','makes.id')->join('avatars','adverts.id','avatars.advert_id')
        ->select('adverts.id as advert_id','adverts.price','adverts.registration_year','adverts.mileage','adverts.fuel_type','adverts.combined_consumption','adverts.transmission','avatars.path','models.model_name', 'makes.make_name')->get();
  
        if($request->ajax()){
            return $recents;
        }

        return view('recent.index',compact('recents'));

    }


}
