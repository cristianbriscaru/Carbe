@extends('layouts.master')
@section('title')
Car Adverts Search Results
@endsection
@section('content')
<div class="">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buy</li>
        </ol>
</nav>
    <div class="container">
        <h2 class="text-info text-center mb-5">Car Adverts Search Results</h2>
        <search v-bind:poptions="false"></search>
        
        <div class="p-2">
            {{$adverts->appends(request()->input())->links()}} 
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if(count($adverts))
                        @foreach($adverts as $advert)
                            <div class="my-5 py-3">
                            <div class="card custom-shadow">
                                <div class="row ">
                                    <div class="col-12 col-md-10 col-lg-5">
                                        <a href="http://carbe.co.uk/car/{{$advert->id}}" ><img class="img-fluid custom-shadow" width="450" height="300" src="http://carbe.co.uk/storage/{{$advert->path}}" alt="Car Vehicle"></a>
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-7 px-3 text-center">
                                        <div class="card-block px-6">
                                            <h3 class="p-1 card-title small-h2 text-truncate font-weight-bold"><a href="http://carbe.co.uk/car/{{$advert->id}}" class="text-secondary"><strong class="text-info">£{{$advert->price}}</strong> - {{$advert->make_name." ".$advert->model_name." ".$advert->variant." ".$advert->registration_year}} </a></h3>
                                            
                                            <ul class="list-inline mt-lg-3 text-secondary">
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Mileage" ><img class="search-desc" src="{{ asset('media/app/mileage.png') }}" width="32px" height="32px" alt="Car Dashboard">{{ $advert->mileage }} mi</li>
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Fuel Type"><img  class="search-desc" src="{{ asset('media/app/pump.png') }}" width="32px" height="32px" alt="Petrol Pump">{{ $advert->fuel_type }}</li>
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Gearbox Type"><img  class="search-desc" src="{{ asset('media/app/gearbox.png') }}" width="32px" height="32px" alt="Car Gearbox">{{ $advert->transmission }}</li>
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Fuel Consumption"><img  class="search-desc" src="{{ asset('media/app/CONSUMPTION.png') }}" width="32px" height="32px" alt="Oil Canister">{{ $advert->combined_consumption }} mpg</li>
                                                    
                                            </ul>

                                            <p class="small-font text-light rounded bg-custom p-2 p-lg-4 mt-lg-3 text-justify"><em>{{str_limit($advert->description,150)}}</em></p>
                                            
                                            <ul class="list-inline w-75 mx-auto share-icon mt-5 mt-lg-2">
                                                <li class="list-inline-item">
                                                    <a class="btn btn-info px-5" href="http://carbe.co.uk/car/{{$advert->id}}" role="button">   Full Details   </a>
                                                </li>
                                                <save-favorite advert="{{$advert->id}}"></save-favorite>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                        @endforeach
                        @else
                            <div class="alert alert-light text-center w-75 mx-auto my-5" role="alert">
                                <h4 class="alert-heading">No Mathching Car Adverts</h4>
                                <hr>
                                <p>Your Search criteria did not match any of our Car Adverts records</p>
                                
                                <p class="mb-0">Please amend the search options and try again</p>
                            </div>
                        @endif
                    </div>
                </div>
            {{$adverts->appends(request()->input())->links()}}

        </div>
        
    </div>
</div>
@endsection
@push('scripts')
    <script>
        window.old=@json(old());
        window.errors=@json($errors->toArray());
        window.makes=@json($makes);
        console.log(window.old);
    </script>
@endpush