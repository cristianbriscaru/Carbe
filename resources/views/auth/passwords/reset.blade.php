@extends('layouts.master')
@section('title')
Reset password
@endsection

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
        </ol>
</nav> 
<div class="container">
    <h2 class="text-center text-info mb-5">Reset your Password</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
                <form method="POST" action="{{ route('password.request') }}" novalidate @submit.prevent="validateForm" >
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
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
                        <div class="col">
                            <label for="password" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Password <span class="text-danger"> *</span></label>
                            <input id="password" type="password" class="form-control custom-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Password here :" name="password" required data-vv-validate-on="blur" v-validate="'required|min:6|max:255'" >
                            @if ($errors->has('password'))
                                <small v-if="(fields.password && fields.password.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                            <small v-show="errors.has('password')" class="form-text custom-input invalid">@{{ errors.first('password') }}</small>
                        </div>    
                        <div class="col">
                            <label for="password-confirm" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Confirm Password <span class="text-danger"> *</span></label>
                            <input id="password-confirm" type="password" class="form-control custom-input " placeholder="Re-Enter Password here :" name="password-confirmation" required data-vv-name="passwordconfirmation" data-vv-validate-on="input" v-validate="'required|min:6|max:255|confirmed:password'" >
                            @if ($errors->has('password'))
                            <small v-if="(fields.passwordconfirmation && fields.passwordconfirmation.pristine)"  class="form-text custom-input invalid">
                                {{ $errors->first('password') }}
                            </small>
                        @endif
                        <small v-show="errors.has('passwordconfirmation')" class="form-text custom-input invalid">@{{ errors.first('passwordconfirmation') }}</small>                                
                    </div>
                        
                    </div>
                    <hr class="custom-input">                        
                   
                    <div class="form-group row mb-0">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Reset Password
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
