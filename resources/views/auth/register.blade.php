@extends('layouts.master')
@section('title')
Register Account
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
</nav>
<div class="container">
    <h2 class="text-center text-info  mb-5">Register your Carbe Account</h2>    
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-12 col-md-10">

                <form method="POST" action="{{ route('register') }}" novalidate @submit.prevent="validateForm" >
                    @csrf
                    <div class="form-group row custom-input">
                        <div class="col-md">
                            <label for="name" class=" custom-input"><i class="material-icons md-48 custom-input">person</i>First Name <span class="text-danger"> *</span></label>
                            <input id="name" type="text" class="form-control custom-input {{ $errors->has('name') ? ' invalid' : '' }}" name="name" placeholder="Enter Name here :" value="{{ old('name') }}" required autofocus v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                            <small v-show="errors.has('name')" class="form-text invalid">@{{ errors.first('name') }}</small>
                            @if ($errors->has('name'))
                                <small v-if="(fields.name && fields.name.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('name') }}
                                </small>
                            @endif
                        </div>
                        
                           
                        <div class="col-md">
                                <hr class="custom-input d-md-none d-lg-none d-xl-none">
                                <label for="surname" class="custom-input"><i class="material-icons md-48 custom-input">person</i>Surname <span class="text-danger"> *</span></label>
                                <input id="surname" type="text" class="form-control custom-input {{ $errors->has('surname') ? ' invalid' : '' }}" name="surname" placeholder="Enter Surname here :" value="{{ old('surname') }}" required v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                                <small v-show="errors.has('surname')" class="form-text invalid">@{{ errors.first('surname') }}</small>
                                @if ($errors->has('surname'))
                                    <small v-if="(fields.surname && fields.surname.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('surname') }}
                                    </small>
                                @endif
                        </div>
                    </div>
                    <hr class="custom-input">
            
                    <div class="form-group row custom-input">
                        <div class="col">
                        <label for="email" class="custom-input"><i class="material-icons md-48 custom-input">email</i>Email <span class="text-danger"> *</span></label>
                        <input id="email" type="email" class="form-control custom-input {{ $errors->has('email') ? 'invalid' : '' }}"   name="email" placeholder="Enter Email here :" value="{{ old('email') }}" required  v-validate="'required|email|max:255'" >
                        @if ($errors->has('email'))
                            <small v-if="(fields.email && fields.email.pristine)"  class="form-text custom-input invalid">
                                {{ $errors->first('email') }}
                            </small>
                        @endif
                       <small v-show="errors.has('email')" class="form-text invalid">@{{ errors.first('email') }}</small>
                        </div>        
                    </div>
                    <hr class="custom-input">                        
                    <div class="form-group row custom-input">
                        <div class="col-md">
                            <label for="password" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Password <span class="text-danger"> *</span></label>
                            <input id="password" type="password" class="form-control custom-input {{ $errors->has('password') ? ' invalid' : '' }}" placeholder="Enter Password here :" name="password" required data-vv-validate-on="blur" v-validate="'required|min:6|max:255'" >
                            @if ($errors->has('password'))
                                <small v-if="(fields.password && fields.password.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                            <small v-show="errors.has('password')" class="form-text custom-input invalid">@{{ errors.first('password') }}</small>
                        </div>    
                        <div class="col-md">
                            <hr class="custom-input d-md-none d-lg-none d-xl-none">
                            <label for="password-confirm" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Confirm Password <span class="text-danger"> *</span></label>
                            <input id="password-confirm" type="password" class="form-control custom-input " placeholder="Re-Enter Password here :" name="password_confirmation" required  data-vv-validate-on="input" v-validate="'required|min:6|max:255|confirmed:password'" >
                            @if ($errors->has('password'))
                            <small v-if="(fields.passwordconfirmation && fields.passwordconfirmation.pristine)"  class="form-text custom-input invalid">
                                {{ $errors->first('password') }}
                            </small>
                        @endif
                        <small v-show="errors.has('passwordconfirmation')" class="form-text custom-input invalid">@{{ errors.first('passwordconfirmation') }}</small>                                
                    </div>
                        
                    </div>
                    <hr class="custom-input">                        
                   
                    <div class="form-group row my-5">
                        <div class="col custom-input text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-50">
                                {{ __('Register') }}
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
