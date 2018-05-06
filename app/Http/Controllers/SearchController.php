<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreSearchable;
use Carbon\Carbon;
use Cookie;
use App\Models;
use App\Searchable;
use App\Repositories\SearchRepository;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['store','destroy','index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searches=auth()->user()->searches()->join('searchables','searches.id','searchables.searchable_id')->where('searchables.searchable_type','App\Search')
        ->select( 'searches.id','searches.created_at as saved', 'searches.url','postcode', 'distance' , 'min_price' , 'max_price', 'state' , 'age', 'service' , 'mileage', 'fuel_type', 'body', 'transmission', 'colour', 'doors', 'consumption', 'seller_type', 'engine_size', 'model', 'make','sortby')->get()->toArray();
        return view('search.index',compact('searches'));
    }

    public function results(SearchRepository $adverts, Request $request){

        $request->flash();
        $adverts=$adverts->search();
        Cookie::queue('saqp', json_encode($request->all()), 1000);
        return view('search.results',['adverts'=>$adverts]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('search.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSearchable $request)
    {   
        $searches=auth()->user()->searches();
        if($searches->count() >= 25){
            return response()->json(['status' => 'error' , 'message' => 'Error Saving Search.  You have reached the maxim number of 25 Saved Searches' ],405);
        }
        $url="http://carbe.co.uk/search/results?postcode=".$request->postcode."&lat=".$request->lat."&lng=".$request->lng."&make=".$request->make."&model=".$request->model."&distance=".$request->distance."&min_price=".$request->min_price."&max_price=".$request->max_price."&state=".$request->state."&age=".$request->age."&service=".$request->service."&mileage=".$request->mileage."&fuel_type=".$request->fuel_type."&transmission=".$request->transmission."&body=".$request->body."&doors=".$request->doors."&consumption=".$request->consumption."&seller_type=".$request->seller_type."&engine_size=".$request->engine_size."&colour=".$request->colour."&sortby=".$request->sortby;
        $searches->create(['url'=>$url])->searchable()->create($request->validated());
        return response()->json(['status'=>'Succes']) ;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        if(auth()->user()->id != $search->user_id){
            $alert=['variant' => 'warning' , 'title' => 'UNAUTHORIZED  DELETE REQUEST' , 'message' => 'You are not authorized to delete this search'];
            return redirect()->route('dashboard')->with('alert',$alert);
        }
        DB::table('searchables')->where('searchable_id',$search->id)->where('searchable_type','App\Search')->delete();
        $search->delete();
        $alert=['variant' => 'warning' , 'title' => 'Search Deleted' , 'message' => 'You have successfuly delete your Search'];
        return redirect()->route('search.index')->with('alert',$alert);
    }
}
