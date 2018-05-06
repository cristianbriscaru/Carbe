@extends('layouts.master')
@section('title')
Contatc Us
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
</nav>
<div class="container">
    <h2 class="text-center text-info mb-5">Contact Carbe</h2>    
    <div class="row justify-content-center">
        <div class="col-lg-9 col-sm-12 col-md-10">
            <div class="custom-shadow row rounded  px-5">
                <h3 class="text-secondary  text-center w-100 mx-auto py-4">Want to contact Carbe ? Leave us a message</h3>
                <form method="POST" action="{{ route('contact.store') }}" novalidate @submit.prevent="validateForm" class="w-100 mx-auto">
                    @csrf
                    <div class="form-group row custom-input">
                            <label for="name" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons mr-3 md-48 custom-input">person</i>Name</label>

                            <div class="col-7">
                                <input id="name" type="text" class="form-control form-control-lg custom-input{{ $errors->has('name') ? ' invalid' : '' }}" name="name" placeholder="Enter Name here :" value="{{ old('name') }}" required autofocus>
                                <small v-show="errors.has('name')" class="form-text invalid">@{{ errors.first('name') }}</small>
                                @if ($errors->has('name'))
                                <small v-if="(fields.name && fields.name.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('name') }}
                                </small>
                                @endif
                            </div>
                    </div>
                    <hr class="custom-input">          
                    <div class="form-group row custom-input">
                            <label for="email" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons mr-3">contact_mail</i>Email<span class="text-danger"> *</span></label>

                            <div class="col-7">
                                <input id="email" type="email" class="form-control form-control-lg custom-input{{ $errors->has('email') ? ' invalid' : '' }}" name="email" placeholder="Enter Email here :" value="{{ old('email') }}" required  v-validate="'required|email|max:255'">
                                <small v-show="errors.has('email')" class="form-text invalid">@{{ errors.first('email') }}</small>
                                @if ($errors->has('email'))
                                <small v-if="(fields.email && fields.email.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </div>
                    </div>
                    <hr class="custom-input">  
                    <div class="form-group row custom-input">
                            <label for="telephone" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons mr-3">contact_phone</i>Telephone</label>

                            <div class="col-7">
                                <input id="telephone" type="text" class="form-control form-control-lg custom-input{{ $errors->has('telephone') ? ' invalid' : '' }}" name="telephone" placeholder="Enter Telephone here :" value="{{ old('telephone') }}"  v-validate="'numeric'">
                                <small v-show="errors.has('telephone')" class="form-text invalid">@{{ errors.first('telephone') }}</small>
                                @if ($errors->has('telephone'))
                                <small v-if="(fields.telephone && fields.telephone.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('telephone') }}
                                    </small>
                                @endif
                            </div>
                    </div>
                    

                    <hr class="custom-input">                      
                    <div class="form-group row custom-input">
                            <label for="message" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons mr-3">comment</i>Message<span class="text-danger"> *</span></label>

                            <div class="col-7">
                                <textarea id="message" rows="2" class="form-control form-control-lg  custom-input"  v-bind:class="{'invalid' : errors.has('message')}"   name="message" placeholder="Enter Message here :"  v-validate="'required|min:1|max:1000'"></textarea>
                                <small v-if="errors.has('message')" class="form-text invalid">@{{ errors.first('message') }}</small>
                                @if ($errors->has('message'))
                                <small v-if="(fields.message && fields.message.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('message') }}
                                    </small>
                                @endif
                            </div>
                    </div>
                    <hr class="custom-input">                  
                    <div class="form-group row mb-5 pb-4">
                        <div class="col custom-input text-center">
                            <button type="submit" class="btn btn-primary w-50">
                              Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="custom-shadow row rounded my-5 px-5 text-center">
                <h3 class="text-secondary w-100 mx-auto py-4">Can't wait for our replay? Get in touch with us</h3>
                <div class="col-12 col-md-6">
                    <h4 class="small-h2 text-secondary"> Contact Details</h4>
                    <ul class="list-group text-light bg-light rounded">
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">call</i>02075114178</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">call_end</i>0746238112</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">drafts</i>contact@carbe.co.uk</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">email</i>suport@carbe.co.uk</li>                        
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="small-h2 text-secondary"> Write Us</h4>
                    <ul class="list-group text-light bg-light rounded pb-4">
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">person_pin</i>Brunel House</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">person_pin_circle</i>340 Firecrest Court</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">pin_drop</i>Warrington</li>
                        <li class="list-group-item my-2 bg-custom"><i class="material-icons mr-3">place</i>Cheshire WA1 1RG</li>                        
                    </ul>
                </div>
            </div>
            <div class="custom-shadow rounded row my-5 px-5 text-center">
                    <h3 class="text-secondary w-100 mx-auto py-4">Want to see us in person ? Visit Carbe</h3>
                    
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
