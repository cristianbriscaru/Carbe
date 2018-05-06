<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use App\User;
class SellerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



        /**
     * Display the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(auth()->user()->cant('show', Seller::class)){
            $msg=['variant' => 'warning' , 'title' => 'No Seller Profile ' , 'message' => 'Please create a Seller Profile first'];
            return redirect('seller/create')->with('alert',$msg);            
        }
        $seller=auth()->user()->seller()->first();
        return view('seller.show',compact('seller'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(auth()->user()->cant('create', Seller::class) ){
            $msg=['variant' => 'warning' , 'title' => 'Seller Profile Exists ' , 'message' => 'Your already have a Seller Profile '];
            return redirect('car/create')->with('alert',$msg);
        }
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->authorize('store', Seller::class);
        $this->validate(request(),[
            'postcode'=>'required|string|min:5|max:7|alpha_num',
            'town'=>"required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
            'county'=>"required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'telephone'=>'required|string|min:11|max:15|unique:sellers,telephone|regex:/^[0-9]+$/',
            'sellertype'=>'required|in:private,trader',
            'business'=>'required_if:sellertype,=,trader|string|min:3|max:255|unique:sellers,business',
            'website'=>'required_if:sellertype,=,trader|url|unique:sellers,website'    
        ]);
        
        Seller::create([
            'sellertype' => request('sellertype'),
            'postcode' => request('postcode'),
            'town' => request('town'),
            'county' => request('county'),
            'lat' => request('lat'),
            'lng' => request('lng'),
            'telephone' => request('telephone'),
            'business' => request('business'),
            'website' => request('website'),
            'user_id' => auth()->id()
        ]);
        
        return redirect('car/create');
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $this->authorize('edit', $seller);

        return view('seller.edit',compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $this->authorize('update', $seller);

        $validated=$request->validate([
            'postcode'=>'required|string|min:5|max:7|alpha_num',
            'town'=>"required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
            'county'=>"required|string|min:2|max:255|regex:/^[a-zA-Z . ,'`-]+$/",
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'telephone'=>'required|string|min:11|max:15|regex:/^[0-9]+$/|unique:sellers,telephone,'.$seller->id,
            'sellertype'=>'required|in:private,trader',
            'business'=>'required_if:sellertype,==,trader|string|min:3|max:255|unique:sellers,business,'.$seller->id,
            'website'=>'required_if:sellertype,==,trader|url|unique:sellers,website,'.$seller->id   
        ]);
        $seller->update($validated);
        $alert=['variant' => 'success' , 'title' => 'Seller Profile Updated' , 'message' => 'Your Carbe Seller Profile has been successfuly updated'];
        return redirect('dashboard')->with('alert',$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $this->authorize('destroy', $seller);

        $seller->delete();
        
        $alert=['variant' => 'warning' , 'title' => 'Your Seller Profile has been DELETED' , 'message' => 'Your Seller Profile has been successfuly deleted'];
        return redirect()->route('dashboard')->with('alert',$alert);

    }
}
