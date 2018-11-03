@extends('layouts.master')
@section('title')
About Carbe
@endsection
@section('content')
<nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
</nav>
<div class="container">
    
    <h2 class="text-center text-info mb-5">About Carbe</h2>    
    <div class="row justify-content-center">
        <div class="col-lg-9 col-sm-12 col-md-10">
            <div class="custom-shadow row rounded  px-5">
                <h3 class="text-secondary  text-center w-100 mx-auto py-4">Whow are we</h3>
                <div class="bg-custom text-light rounded custom-shadow p-5 mb-5">
                    <p class="">Carbe LTD is a start-up company looking to gain more and more field on the UK automotive marketplace.
                         Carbe.co.uk is bringing together private sellers, trade sellers and buyers. Anyone can become member of 
                         Carbe.co.uk by creating an account and subscribing to our page. Carbe project started as a small idea of business 
                         of two students in collaborationwith Gringo LTD but we are looking to become a brand and new competitor of AutoTrader 
                         and other automotive selling websites.
                    </p>
                </div>
            </div>
            <div class="custom-shadow row rounded my-5 px-5 text-center">
                <h3 class="text-secondary w-100 mx-auto py-4">Our Details</h3>
                <div class="col-12 col-md-6">
                    <h4 class="small-h2 text-secondary"> Contact Details</h4>
                    <ul class="list-group text-light bg-light rounded">
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">call</i>02075224178</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">call_end</i>074534622312</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">drafts</i>contact@carbe.co.uk</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">email</i>suport@carbe.co.uk</li>                        
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="small-h2 text-secondary"> Address Details</h4>
                    <ul class="list-group text-light bg-light rounded pb-4">
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">person_pin</i>Arond House</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">person_pin_circle</i>6 Devonshire Square</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">pin_drop</i>London</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">place</i>EC2M 4YE</li>                        
                    </ul>
                </div>
            </div>
            <div class="custom-shadow rounded row my-5 px-5 text-center">
                    <h3 class="text-secondary w-100 mx-auto py-4">Where to find us</h3>
                    
                    <div id="maps-wraper" class="rounded mb-5">
                        <div id='gmap_canvas' class="rounded mb-5">
                            
                        </div>
                    
                </div> 
                
               

                    
            </div>
        </div>
    </div>
</div>
@endsection
@push('top-scripts')
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyD98yxGWM7K7C3r4dlybd3WTk3RyqP11_M'></script>
@endpush
@push('scripts')
<script type='text/javascript' src="{{ asset('js/maps.js') }}"></script>

@endpush
