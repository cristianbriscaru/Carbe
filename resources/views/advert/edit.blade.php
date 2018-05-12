@extends('layouts.master')
@section('title')
Edit Car Advert
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('advert.index')}}">Adverts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
</nav> 
<div class="container">
    
      
        <h2 class="text-center text-info heading">Edit Car Advert</h2>               
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 min-page-height" >
                <advert-create :display-vehicle-lookup="false" :advert-id="{{$advert->id}}"></advert-create>
            </div>
        </div>
    </div>     



@endsection
@push('scripts')
    <script>
        window.old=[];
        window.old.vrm=@json( old('vrm' , $advert->vrm ) );
        window.old.make=@json( old('make' , $advert->model()->first()->make()->first()->make_name) );
        window.old.model=@json( old('model' , $advert->model()->first()->model_name ) );
        window.old.variant=@json( old('variant' , $advert->variant ) );
        window.old.body=@json( old('body' , $advert->body ) );
        window.old.service=@json( old('service' , $advert->service ) );
        window.old.price=@json( old('price' , $advert->price ) );
        window.old.mileage=@json( old('mileage' , $advert->mileage ) );
        window.old.state=@json( old('state' , $advert->state ) );
        window.old.description=@json( old('description' , $advert->description ) );
        window.old.fuel_type=@json( old('fuel_type' , $advert->fuel_type ) );
        window.old.transmission=@json( old('transmission' , $advert->transmission ) );
        window.old.colour=@json( old('colour' , $advert->colour ) );
        window.old.doors=@json( old('doors' , $advert->doors ) );
        window.old.seats=@json( old('seats' , $advert->seats ) );
        window.old.registration_year=@json( old('registration_year' , $advert->registration_year ) );
        window.old.engine_size=@json( old('engine_size' , $advert->engine_size ) );
        window.old.power=@json( old('power' , $advert->power ) );
        window.old.emissions=@json( old('emissions' , $advert->emissions ) );
        window.old.combined_consumption=@json( old('combined_consumption' , $advert->combined_consumption ) );
        window.old.urban_consumption=@json( old('urban_consumption' , $advert->urban_consumption ) );
        window.old.motorway_consumption=@json( old('motorway_consumption' , $advert->motorway_consumption ) );
        window.old.owners=@json( old('owners' , $advert->owners ) );
        window.old.tax=@json( old('tax' , $advert->tax ) );
        window.old.euro=@json( old('euro' , $advert->euro ) );
        window.old.features=@json( old('features' , $advert->features()->get() ) );

        
        window.errors=@json($errors->toArray());
        window.makes=@json($makes);
    </script>
@endpush