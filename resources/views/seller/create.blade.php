@extends('layouts.master')
@section('title')
Seller Registration
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('advert.create')}}">Sell</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller</li>
        </ol>
</nav>
    <div class="container "> 
        <div class="row justify-content-center text-center mx-lg-5"> 
            <div class="col stepper ">
                <div class="d-inline-flex first-step small-i">
                    <p class="stepper text-success"><i class="material-icons border border-success rounded-circle p-2 mr-2">done</i>User Profile</p>
                </div>                            
            </div>   
            <div class="col stepper">
                <div class="d-inline-flex small-i">
                    <p class="text-info stepper"><i class="material-icons border border-info rounded-circle p-2 mr-2">account_balance</i>Seller Profile</p>
                </div>                   
            </div>     
            <div class="col stepper ">
                <div class="d-inline-flex last-step small-i">
                    <p class="stepper text-secondary"><i class="material-icons text-info border border-info  rounded-circle p-2 mr-2">directions_car</i>Create Advert</p>
                </div>
            </div>                        
        </div>    
        <h2 class="text-center text-info heading">Register your Seller Details</h2>               
        <div class="row justify-content-center ">      
            <div class="col-lg-8 col-sm-12 col-md-10">
                <seller-create methods="post" seller-id="false"></seller-create>   
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.old=@json(old());
        window.errors=@json($errors->toArray());
    </script>
@endpush
