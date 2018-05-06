<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Models;
use App\Http\Requests\StoreSearchable;
use App\Searchable;
use DB;
class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions=auth()->user()->subscriptions()->join('searchables','subscriptions.id','searchables.searchable_id')->where('searchables.searchable_type','App\Subscription')
        ->select( 'subscriptions.id','subscriptions.created_at as subscribed', 'postcode', 'distance' , 'min_price' , 'max_price', 'state' , 'age', 'service' , 'mileage', 'fuel_type', 'body', 'transmission', 'colour', 'doors', 'consumption', 'seller_type', 'engine_size', 'model', 'make','sortby')->get()->toArray();
        return view('subscription.index',compact('subscriptions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSearchable $request)
    {   
        $subscriptions=auth()->user()->subscriptions();
        if($subscriptions->count() >= 5){
            return response()->json(['status' => 'error' , 'message' => 'Error Saving Subscription.  You have reached the maxim number of 5 Saved Subscriptions' ],405);
        }
        $subscriptions->save( new Subscription() )->subscribable()->create($request->validated());
        return response()->json(['status'=>'Succes']) ;
    }
    /**
     * Delete a resource.
     *
     * @param  \Illuminate\Http\$subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        if(auth()->user()->id != $subscription->user_id){
            $alert=['variant' => 'warning' , 'title' => 'UNAUTHORIZED  DELETE REQUEST' , 'message' => 'You are not authorized to delete this Subscription'];
            return redirect()->route('dashboard')->with('alert',$alert);
        }
        DB::table('searchables')->where('searchable_id',$subscription->id)->where('searchable_type','App\Subscription')->delete();
        $subscription->delete();
        $alert=['variant' => 'warning' , 'title' => 'Subscription Deleted' , 'message' => 'You have successfuly delete your Subscription'];
        return redirect()->route('subscription.index')->with('alert',$alert);
        

    }


}
