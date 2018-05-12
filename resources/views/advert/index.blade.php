@extends('layouts.dashboard')
@section('title')
Published Car Adverts
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adverts</a></li>
            
        </ol>
</nav>
    <h2 class="text-center text-info">Published Car Adverts</h2> 
    <div class="row justify-content-center text-light text-center">
        <div class="col-12 col-md-12 col-lg-10  rounded px-5">
            @if(count($adverts))
                @foreach($adverts as $advert)

                    <div class="row my-5 custom-shadow  justify-content-center">
                        <div class="col-12 p-0">
                                <div class="card my-0 bg-custom custom-shadow">
                                        <div class="row">
                                            <div class="col-6 col-md-5 col-lg-4 p-0">
                                                <a href="{{route('advert.show',['advert' => $advert->id]) }}" ><img class="img-fluid w-100 custom-shadow" width="200" height="150" src="{{asset('storage')."/".$advert->avatar->path}}" alt="Car Vehicle"></a>
                                            </div>
                                            <div class="col-6 col-md-7 col-lg-8 p-1 text-center">
                                                <div class="card-block p-0">
                                                    <h3 class="card-title mt-2 mt-md-4 mt-lg-5 small-h2 text-uppercase font-weight-bold"><a href="{{route('advert.show',['advert' => $advert->id]) }}" class="text-light">VRM : {{$advert->vrm}} <br>
                                                        £{{$advert->price." ".$advert->make_name." ".$advert->model_name." ".$advert->variant." ".$advert->fuel_type." ".$advert->transmission." ".$advert->registration_year}}</a></h3>
                                                    
                                                    <p>Published On : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($advert->created_at))->toFormattedDateString() }} </p>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                        </div>
                        <div class="col-10  p-0 rounded">
                            <ul class="share-icon my-3">
                                <li class="w-25"><a class="btn btn-primary w-100" href="{{route('advert.show',['advert' => $advert->id]) }}" role="button">View</a></li>
                                <li class="w-25"><a class="btn btn-warning w-100" href=" {{route('advert.edit',['advert' => $advert->id]) }}" role="button">Edit</a></li>
                                <li class="w-25"><button type="submit" form="{{$advert->id}}" value="Delete" class="btn btn-danger w-100">Delete</button></li>
                            </ul>
                            <form method="POST" action=" {{route('advert.destroy',['advert' => $advert->id])}} " id="{{$advert->id}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                            </form> 
                
                        </div>
                
                    </div>

                @endforeach
            @else
                <div class="w-100 mx-auto m-5 p-5 rounded bg-custom">
                    <h3 class="">No Published Car Adverts</h3>
                    <hr class="custom-input">
                    <p> Please Publish Car Adverts and you will be able to view them here</p>
                    <p class="my-2"><a class="btn btn-primary w-50" href="{{ route('advert.create') }}" role="button">Create Advert</a>  </p>
                    <hr class="custom-input">
                    <p> For more Information on Publishing Car Adverts please see our Help page</p>
                    <p class="my-2"><a class="btn btn-light w-50" href="{{ route('help') }}" role="button">Help</a>  </p>

                </div>
            @endif
        </div>
    </div>
@endsection