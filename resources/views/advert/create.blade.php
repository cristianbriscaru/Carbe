@extends('layouts.master')
@section('title')
Create Car Advert
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sell</li>
        </ol>
</nav>
<div class="container">
    @if( !auth()->user()->adverts()->exists() )
    <div class="row justify-content-center text-center mx-lg-5"> 
        <div class="col stepper ">
            <div class="d-inline-flex first-step small-i">
                <p class="stepper text-success"><i class="material-icons border border-success rounded-circle p-2 mr-2">done</i>User Profile</p>
            </div>                            
        </div>   
        <div class="col stepper">
            <div class="d-inline-flex small-i">
                <p class="text-success stepper"><i class="material-icons border border-success rounded-circle p-2 mr-2">done</i>Seller Profile</p>
            </div>                   
        </div>     
        <div class="col stepper ">
            <div class="d-inline-flex last-step small-i">
                <p class="stepper text-info"><i class="material-icons text-info border border-info rounded-circle p-2 mr-2">directions_car</i>Create Advert</p>
            </div>
        </div>                        
    </div>
    @endif   
        <h2 class="text-center text-info my-5">Create Car Advert</h2>               
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 min-page-height" >
                <advert-create :display-vehicle-lookup="true"></advert-create>
            </div>
        </div>
    </div>     



@endsection
@push('scripts')
    <script>
        window.old=@json(old());
        window.errors=@json($errors->toArray());
        window.makes=@json($makes);
    </script>
@endpush