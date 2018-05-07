<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Requests\StoreAdvert;
use Image;
use App\Advert;
use App\Models;
use App\Make;
use App\Repositories\SubscriptionRepository;
use App\Http\Requests\UpdateAdvert;
use App\Repositories\RecentRepository;
use Mail;

class AdvertController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except(['show','modelsLookUp']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->cant('index', Advert::class) ){
            $msg=['variant' => 'warning' , 'title' => 'Create Seller Profile First' , 'message' => 'Please register your Seller Profile in order to be able to view your for sale car adverts'];
            return redirect('seller/create')->with('alert',$msg);
        }

        $adverts=auth()->user()->seller()->first()->adverts()->join('models','adverts.model_id','models.id')
        ->join('makes','models.make_id','makes.id')->join('avatars','adverts.id','avatars.advert_id')
        ->select('adverts.id','adverts.vrm','adverts.price','adverts.created_at','adverts.registration_year','adverts.variant','adverts.mileage','adverts.fuel_type','adverts.transmission','avatars.path','models.model_name', 'makes.make_name')->get();

        return view('advert.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(auth()->user()->cant('create', Advert::class) ){
            return redirect('seller/create');
        }

        return view('advert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvert $request, SubscriptionRepository $subscriptions)
    {   dd($request);
        $this->authorize('store', Advert::class);
        $modelId=Models::where('model_name',request('model'))->join('makes', function($join){ 
                $join->on('models.make_id','=','makes.id')->where('make_name','=', request('make')); 
                })->select('models.id')->first()->id;

         $advert=Advert::create([
            'vrm'=> request('vrm'),
            'price'=> request('price'),
            'mileage'=> request('mileage'),
            'state'=> request('state'),
            'variant'=> request('variant'),
            'body'=> request('body'),
            'transmission'=> request('transmission'),
            'fuel_type'=> request('fuel_type'),
            'colour'=> request('colour'),
            'doors'=> request('doors'),
            'seats'=> request('seats'),
            'registration_year'=> request('registration_year'),
            'engine_size'=> request('engine_size'),
            'emissions'=> request('emissions'),
            'power'=> request('power'),
            'urban_consumption'=> request('urban_consumption'),
            'combined_consumption'=> request('combined_consumption'),
            'motorway_consumption'=> request('motorway_consumption'),
            'description'=> request('description'),
            'service'=> request('service'),
            'owners'=> request('owners'),
            'tax'=> request('tax'),
            'euro'=> request('euro'),
            'mot'=> request('mot'), 
            'seller_id'=> auth()->user()->seller->id,
            'model_id'=> $modelId,
        ]); 

        if($request->has('features')){
           $advert->features()->syncWithoutDetaching(request('features'));
        }

        if($request->hasFile('photos')){

            $images=request('photos');

            $path = $images[0]->store('media/avatar');
            Image::make('../storage/app/public/'.$path)->fit(450,300)->encode('jpg',100)->save()->destroy();
            $advert->avatar()->create(['path'=>$path]); 

            foreach($images as $image){
                $path = $image->store('media/photos');
                Image::make('../storage/app/public/'.$path)->fit(800,500)->encode('jpg',100)->save()->destroy();
                $advert->photos()->create(['path'=>$path]);                               
            }
        } 
        $subscriptions->subscribable($advert);
        $user=auth()->user();
        Mail::to($user)->send(new \App\Mail\AdvertCreated($user,$advert));
        $alert=['variant' => 'success' , 'title' => 'Car Advert Created' , 'message' => 'Your Car Advert has been successfuly created and is now ready to be seen by buyers '];
        return back()->with('alert',$alert);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(RecentRepository $recent , Advert $advert)
    {

        $recent->addRecent($advert);
        return view('advert.show',compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        $this->authorize('edit', $advert);
        return view('advert.edit',compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvert $request, Advert $advert)
    {   
        $this->authorize('update', $advert);
        $modelId=Models::where('model_name',request('model'))->join('makes', function($join){ 
            $join->on('models.make_id','=','makes.id')->where('make_name','=', request('make')); 
            })->select('models.id')->first()->id;
        $validated=$request->validated();
        $validated['model_id']=$modelId;
        unset($validated['make'],  $validated['model']);
        $advert->update($validated);
        $alert=['variant' => 'success' , 'title' => 'Car Advert Updated' , 'message' => 'Your Car Advert has been successfuly updated'];
        return redirect()->route('advert.index')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
       
        $this->authorize('destroy', $advert);
        $advert->delete();
        $alert=['variant' => 'warning' , 'title' => 'Car Advert Deleted' , 'message' => 'Your Car Advert has been successfuly deleted'];
        return redirect()->route('advert.index')->with('alert',$alert);
    }

    //Vehicle data lookup from UK Vehicle Data
    //@param  \Illuminate\Http\Request  $request ->VRM
    //@return \Illuminate\Http\Response 

    public function vehicleLookUp(Request $request){
        $key=env("UKVEHICLEDATA_KEY", "3d2db562-a04c-4b90-aa3b-5d81bc37a91d");
        $vrm= request('vrm');
        $client = new Client();
        $request = $client->get('https://uk1.ukvehicledata.co.uk/api/datapackage/VehicleAndMotHistory?v=2&api_nullitems=1&auth_apikey='.$key.'&key_VRM='.$vrm);
        $response = $request->getBody();
        return $response;
    }

        /**
     * List all models for specific maker.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function modelsLookUp(Request $request){
        $request->validate(['make'=> 'required|string|exists:makes,make_name']);
        $models = Make::where('make_name',request('make'))->first()->models()->get()->pluck('model_name');
        return $models;
    }
}
