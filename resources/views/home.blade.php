@extends('layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
<div class="container">
    <h2 class="text-info text-center mb-5">Buy & Sell Cars on Carbe</h2>
    <search v-bind:poptions="false"></search>
    <div class="card py-5">
        <img class="card-img-top" src="{{ asset ('media/app/cars-time.png') }}" width ="900" height="200" alt="Road">
        <div class="card-body bg-secondary custom-shadow text-light">
            <h3 class="card-title">Sell Cars on Carbe</h3>
            <hr>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <p class="card-text bg-custom rounded mb-4 p-md-2 p-lg-3">Selling cars has never been easier. Carbe enables you to sell a car fallowing 3 simple steps :</p>
                        <p class="card-text bg-custom rounded p-md-2 p-lg-3">And the good part is that you only have to register your user and seller details once.</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <ul class="list-group ">
                            <li class="list-group-item bg-custom mb-2">1. User Registration</li>
                            <li class="list-group-item bg-custom my-2">2. Seller Registration</li>
                            <li class="list-group-item bg-custom mt-2">3. Create Advert</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card py-5">
        <img class="card-img-top" src="{{ asset ('media/app/cars-line.png') }}" width ="900" height="200" alt="Road">
        <div class="card-body bg-secondary custom-shadow text-light">
            <h3 class="card-title">Buy Cars on Carbe</h3>
            <hr>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <p class="card-text bg-custom rounded mb-4 p-md-2 p-lg-3">Searching for cars to buy has been made a breeze on Carbe. Just fallow this 3 simple steps :</p>
                        <p class="card-text bg-custom rounded p-md-2 p-lg-3">We will remember your search options and will even let you save searches. We are nice like that.</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <ul class="list-group ">
                            <li class="list-group-item bg-custom mb-2">1. Enter Postcode</li>
                            <li class="list-group-item bg-custom my-2">2. Select Options</li>
                            <li class="list-group-item bg-custom mt-2">3. Click Search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="card py-5">
        <img class="card-img-top" src="{{ asset ('media/app/techs.png') }}" width ="900" height="200"  alt="technology">
        <div class="card-body bg-secondary custom-shadow text-light">
            <h3 class="card-title">The Power of Carbe</h3>
            <hr>
            <div class="p-3 mt-4">
                <p class="card-text bg-custom rounded p-3">Carbe was designed from the ground up to make it as easy as posible 
                    to search and buy cars. In order to facilitate just that we have added the fallowing features :
                </p>
            
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <ul class="list-group ">
                            <li class="list-group-item bg-custom mb-2">1. Remember Search</li>
                            <li class="list-group-item bg-custom my-2">2. Save Searches</li>
                            <li class="list-group-item bg-custom mt-2">3. Subscriptions</li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="custom-shadow rounded p-3">
                        <ul class="list-group ">
                            <li class="list-group-item bg-custom mb-2">4. Favorite Cars</li>
                            <li class="list-group-item bg-custom my-2">5. Recent Cars</li>
                            <li class="list-group-item bg-custom mt-2">6. Social Sharing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
@endsection
@push('scripts')
<script>
    window.old=@json(  count(old()) || $searchQuery == null ? old() : $searchQuery );
    window.errors=@json($errors->toArray());
    window.makes=@json($makes); 
</script>
@endpush