@extends('layouts.dashboard')
@section('title')
Recent Car Adverts
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recents</li>
        </ol>
</nav>
    <h2 class="text-center text-info heading mb-5">Recent Viewed Car Adverts</h2> 
    <div class="row justify-content-center text-center">
        <div class="col-12 col-md-11 col-lg-10  px-5 text-light">
            @if(count($recents))
                @foreach($recents as $recent)

                    <div class="row my-5 custom-shadow">
                        <div class="col-12 p-0 bg-custom rounded">
                                <div class="card my-0 custom-shadow bg-custom">
                                        <div class="row">
                                            <div class="col-12 col-md-4 col-lg-3 p-0 justify-content-center">
                                                <a href="{{route('advert.show',['advert' => $recent->advert_id]) }}" class="w-100 mx-auto" ><img class="img-fluid w-100 custom-shadow" width="200" height="150" src="{{asset('storage')."/".$recent->path}}" alt="Car Vehicle"></a>
                                            </div>
                                            <div class="col-12 col-md-8 col-lg-9 p-0 pt-3 pt-md-0 pt-lg-3 text-center">
                                                <div class="card-block p-0">
                                                    <h3 class="pt-1  card-title small-h2 text-truncate text-uppercase font-weight-bold"><a href="{{route('advert.show',['advert' => $recent->advert_id]) }}" class="text-light"><strong>£ {{$recent->price}}</strong>  {{$recent->make_name." ".$recent->model_name." ".$recent->registration_year}} </a></h3>
                                                    <p class="text-italic">Viewed on : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($recent->created_at))->toFormattedDateString() }}</p>
                                                    <ul class="share-icon text-light pb-3 small-font">                                                         
                                                            <li class="ml-5" v-b-tooltip.hover title="Mileage" ><img class="search-desc" src="{{ asset('/media/app/mileage.png')  }}" width="32px" height="32px" alt="Car Dashboard">{{ $recent->mileage }} mi</li>
                                                            <li class="mx-1" v-b-tooltip.hover title="Fuel Type"><img  class="search-desc" src="{{ asset('/media/app/pump.png')  }}" width="32px" height="32px" alt="Petrol Pump">{{ $recent->fuel_type }}</li>
                                                            <li class="mr-5" v-b-tooltip.hover title="Gearbox Type"><img  class="search-desc" src="{{ asset('/media/app/gearbox.png')  }}" width="32px" height="32px" alt="Car Gearbox">{{ $recent->transmission }}</li>                                                            
                                                    </ul>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                        </div>
                        <div class="col-12 my-3">
                            <p><a class="btn btn-info w-50" href="{{route('advert.show',['advert' => $recent->advert_id]) }}" role="button">View</a></p>
                        </div>
                
                    </div>

                @endforeach
            @else
                <div class="w-100 mx-auto p-5 rounded bg-custom">
                    <h3 class="">No Recent Viewed Car Adverts</h3>
                    <hr class="custom-input">
                    <p> Please view Car Advert and you will be able to see the last 5 here</p>
                    
                    
                    <p> For more Information on Recent Car Adverts please see our Help page</p>
                    <p class="my-2"><a class="btn btn-warning w-50" href="{{ route('help') }}" role="button">Help</a>  </p>

                </div>
            @endif
        </div>
    </div>
@endsection