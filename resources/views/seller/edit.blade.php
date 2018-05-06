@extends('layouts.dashboard')
@section('title')
Edit Seller Profile 
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Seller Profile</li>
        </ol>
</nav>
     
        <h2 class="text-center text-info heading mb-4">Edit Seller Profile</h2>               
        <div class="row justify-content-center ">      
            <div class="col-lg-8 col-sm-12 col-md-10">
                <seller-create methods="patch" :seller-id="{{$seller->id}}"></seller-create>   
            </div>
        </div>

@endsection
@push('scripts')
    <script>
        window.old=[];
        window.old.postcode=@json(old('postcode' , $seller->postcode));
        window.old.lat=@json(old('lat' , $seller->lat));
        window.old.lng=@json(old('lng' , $seller->lng));
        window.old.town=@json(old('town' , $seller->town));
        window.old.county=@json(old('county' , $seller->county));
        window.old.postcode=@json(old('postcode' , $seller->postcode));
        window.old.telephone=@json(old('telephone' , $seller->telephone));
        window.old.sellertype=@json(old('sellertype' , $seller->sellertype));
        window.old.business=@json(old('business' , $seller->business == null ? '' : $seller->business));
        window.old.website=@json(old('website' , $seller->website == null ? '' : $seller->website));
        window.errors=@json($errors->toArray());
    </script>
@endpush
