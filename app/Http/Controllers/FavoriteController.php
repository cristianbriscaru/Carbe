<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $favorites=auth()->user()->favorites()->join('adverts','favorites.advert_id','adverts.id')->join('models','adverts.model_id','models.id')
        ->join('makes','models.make_id','makes.id')->join('avatars','adverts.id','avatars.advert_id')
        ->select('favorites.id as favorite_id','favorites.created_at','adverts.id as advert_id','adverts.price','adverts.registration_year','adverts.mileage','adverts.fuel_type','adverts.combined_consumption','adverts.transmission','avatars.path','models.model_name', 'makes.make_name')->get();
        if($request->ajax()){
            return $favorites;
        }
       
        return view('favorite.index',compact('favorites'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $favorites=auth()->user()->favorites();
        if(count($favorites->get()) >= 25){
            return response()->json(['statusText' => 'Maximum Number of Adverts Reached', 'message'=> 'You have reached your maximum number of 25 Favorite Adverts'],405);
        }
        $validated=$request->validate(['advert_id'=>'required|numeric|exists:adverts,id']);
        $favorites->firstOrCreate($validated);
        return response()->json(['status'=>'success','message'=>'Favorite succesufuly saved']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {


        if($favorite->user_id != auth()->user()->id){
            $alert=['variant' => 'warning' , 'title' => 'UNAUTHORIZED  DELETE REQUEST' , 'message' => 'You are not authorized to delete this Favorite Car Advert'];
            return redirect()->route('dashboard')->with('alert',$alert);
        }
        
        $favorite->delete();
        
        $alert=['variant' => 'warning' , 'title' => 'Your Favorite Car Advert  has been DELETED' , 'message' => 'Your Favorite Car Advert has been successfuly deleted'];
        return redirect()->route('favorite.index')->with('alert',$alert);
    }
}
