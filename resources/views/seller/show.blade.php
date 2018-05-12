@extends('layouts.dashboard')
@section('title')
Seller Profile
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Seller Profile</li>
        </ol>
</nav>
<h2 class="text-center text-info mb-5">Seller Profile</h2> 

<div class="row text-light text-center justify-content-center mb-5">
    <div class="col-10 col-md-8 py-5">
    <ul class="list-group mb-5 mt-3">
        <li class="list-group-item bg-custom my-2">{{$seller->county." , ".$seller->town." , ".$seller->postcode}}</li>
        <li class="list-group-item bg-custom my-2">{{$seller->telephone}}</li>
        <li class="list-group-item bg-custom my-2 text-capitalize">{{$seller->sellertype}} Seller</li>
        @isset($seller->business)
        <li class="list-group-item bg-custom my-2">{{$seller->business}}</li>
        <li class="list-group-item bg-custom my-2 text-capitalize text-truncate">{{$seller->website}}</li>
        @endisset
    </ul>
    <div class="row">
        <div class="col-6">
            <button type="submit" form="delete" value="Delete" class="btn btn-danger w-75">Delete</button>
        </div>
        <div class="col-6">
            <a class="btn btn-info w-75" href=" {{route('seller.edit',['seller' => $seller->id ])}} " role="button">Edit</a>
        </div>
    </div>
    </div>
</div>
<form method="POST" action=" {{route('seller.destroy',['seller' => $seller->id ])}} " id="delete">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form> 

@endsection