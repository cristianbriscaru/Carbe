@extends('layouts.dashboard')
@section('title')
My Carbe Dashboard
@endsection

@section('resources')
<nav aria-label="breadcrumb" class="float-left ">
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<h2 class="text-center text-info heading">My Carbe Dashboard</h2>
    <div class=" rounded text-center  text-light">
         
        
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5 py-3">
                    <div class="custom-shadow rounded bg-secondary ">
                        <h3>Favorite Cars</h3> 
                        <radial-progress-bar
                        class="w-100 mx-auto" 
                        :diameter="225"
                        :completed-steps="{{ 25 - $favorites }}"
                        :total-steps="25"
                        inner-stroke-color="#979797"
                        :stroke-width="30"
                        :animate-speed="5000"  
                        
                        >
                            <small>Saved Favorites: {{$favorites}}</small>
                            <small>Max Favorites: 25</small>                            
                            <small>Remaining: {{ 25 - $favorites }}</small>
                        </radial-progress-bar>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 py-3">
                    <div class="custom-shadow rounded  bg-secondary">
                        <h3>Recent Cars</h3> 
                        <radial-progress-bar
                        class="w-100 mx-auto" 
                        :diameter="225"
                        :completed-steps="{{ 5 - $recents }}"
                        :total-steps="5"
                        inner-stroke-color="#979797"
                        :stroke-width="30"
                        :animate-speed="5000"  
                        
                        >
                            <small>Stored Recents: {{$recents}}</small>
                            <small>Max Recents: 5</small>
                            <small>Remaining: {{ 5 - $recents }}</small>
                        </radial-progress-bar>
                    </div>
                </div>                
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5 py-3">
                    <div class="custom-shadow rounded  bg-secondary">
                        <h3>Searches</h3> 
                        <radial-progress-bar
                        class="w-100 mx-auto" 
                        :diameter="225"
                        :completed-steps="{{ 25 - $searches }}"
                        :total-steps="25"
                        inner-stroke-color="#979797"
                        :stroke-width="30"
                        :animate-speed="5000"  
                        
                        >
                            <small>Saved Searches: {{$searches}}</small>
                            <small>Max Searches: 25</small>                            
                            <small>Remaining: {{ 25 - $searches }}</small>
                        </radial-progress-bar>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 py-3">
                    <div class="custom-shadow rounded  bg-secondary">
                        <h3>Subscriptions</h3> 
                        <radial-progress-bar
                        class="w-100 mx-auto" 
                        :diameter="225"
                        :completed-steps="{{ 5 - $subscriptions }}"
                        :total-steps="5"
                        inner-stroke-color="#979797"
                        :stroke-width="30"
                        :animate-speed="5000"  
                        
                        >
                            <small>Saved Subscriptions: {{$subscriptions}}</small>
                            <small>Max Subscriptions: 5</small>
                            <small>Remaining: {{ 5 - $subscriptions }}</small>
                        </radial-progress-bar>
                    </div>
                </div>                
    </div>

@endsection