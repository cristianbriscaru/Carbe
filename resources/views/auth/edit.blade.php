@extends('layouts.dashboard')
@section('title')
Edit Account
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
        </ol>
</nav> 
<div class="container">
    <h2 class="text-center text-info mb-5">Edit User Profile</h2>    
    <div class="row justify-content-center">
        <div class=" col-10 col-md-8 ">

                <form method="POST" action="{{ route('user.update')}}" novalidate @submit.prevent="validateForm" >
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    
                            <div class="form-group row custom-input">
                            <label for="name" class=" custom-input"><i class="material-icons md-48 custom-input">person</i>First Name <span class="text-danger"> *</span></label>
                            <input id="name" type="text" class="form-control custom-input {{ $errors->has('name') ? ' invalid' : '' }}" name="name" placeholder="Enter Name here :" value="{{ old('name', $user->name) }}" required autofocus v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                            <small v-show="errors.has('name')" class="form-text invalid">@{{ errors.first('name') }}</small>
                            @if ($errors->has('name'))
                                <small v-if="(fields.name && fields.name.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>

                        <hr class="custom-input">
                           
                        <div class="form-group row custom-input">
                                
                                <label for="surname" class="custom-input"><i class="material-icons md-48 custom-input">person</i>Surname <span class="text-danger"> *</span></label>
                                <input id="surname" type="text" class="form-control custom-input {{ $errors->has('surname') ? ' invalid' : '' }}" name="surname" placeholder="Enter Surname here :" value="{{ old('surname', $user->surname) }}" required v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                                <small v-show="errors.has('surname')" class="form-text invalid">@{{ errors.first('surname') }}</small>
                                @if ($errors->has('surname'))
                                    <small v-if="(fields.surname && fields.surname.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('surname') }}
                                    </small>
                                @endif
                        </div>
                   
                    <hr class="custom-input">
            
                    <div class="form-group row custom-input">
                        
                        <label for="email" class="custom-input"><i class="material-icons md-48 custom-input">email</i>Email <span class="text-danger"> *</span></label>
                        <input id="email" type="email" class="form-control custom-input {{ $errors->has('email') ? 'invalid' : '' }}"   name="email" placeholder="Enter Email here :" value="{{ old('email', $user->email) }}" required  v-validate="'required|email|max:255'" >
                        @if ($errors->has('email'))
                            <small v-if="(fields.email && fields.email.pristine)"  class="form-text custom-input invalid">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                       <small v-show="errors.has('email')" class="form-text invalid">@{{ errors.first('email') }}</small>
                              
                    </div>
                    <hr class="custom-input">                        
                    <div class="form-group row my-5">
                        <div class="col custom-input text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-50">
                                    {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
