@extends('layouts.master')
@section('title')
Change Password
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.show')}}">User Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
</nav> 
<div class="container">
    <h2 class="text-center text-info mb-5">Change your Password</h2>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
                <form method="POST" action="{{ route('user.changepassword') }}" novalidate @submit.prevent="validateForm" >
                    @csrf
                
                    <div class="form-group row custom-input">
                            <label for="oldpassword" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Current Password <span class="text-danger"> *</span></label>
                            <input id="oldpassword" type="password" class="form-control custom-input {{ $errors->has('current_password') ? ' is-invalid' : '' }}" placeholder="Enter Current Password here :" name="current_password" required data-vv-validate-on="blur" v-validate="'required|min:6|max:255'" >
                            @if ($errors->has('current_password'))
                                <small v-if="(fields.current_password && fields.current_password.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('current_password') }}
                                </small>
                            @endif
                            <small v-show="errors.has('password')" class="form-text custom-input invalid">@{{ errors.first('password') }}</small>
                        </div> 
                    <hr class="custom-input">                        
                    
                    <div class="form-group row custom-input">
                            <label for="password" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>New Password <span class="text-danger"> *</span></label>
                            <input id="password" type="password" class="form-control custom-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter New Password here :" name="password" required data-vv-validate-on="blur" v-validate="'required|min:6|max:255'" >
                            @if ($errors->has('password'))
                                <small v-if="(fields.password && fields.password.pristine)"  class="form-text custom-input invalid">
                                    {{ $errors->first('password') }}
                                </small>
                            @endif
                            <small v-show="errors.has('password')" class="form-text custom-input invalid">@{{ errors.first('password') }}</small>
                        </div>    
                        <hr class="custom-input">  
                    <div class="form-group row custom-input">
                            <label for="password-confirm" class="custom-input"><i class="material-icons md-48 custom-input">lock</i>Confirm New Password <span class="text-danger"> *</span></label>
                            <input id="password-confirm" type="password" class="form-control custom-input " placeholder="Re-Enter New Password here :" name="password_confirmation" required data-vv-name="passwordconfirmation" data-vv-validate-on="input" v-validate="'required|min:6|max:255|confirmed:password'" >
                            @if ($errors->has('password'))
                            <small v-if="(fields.passwordconfirmation && fields.passwordconfirmation.pristine)"  class="form-text custom-input invalid">
                                {{ $errors->first('password') }}
                            </small>
                        @endif
                        <small v-show="errors.has('passwordconfirmation')" class="form-text custom-input invalid">@{{ errors.first('passwordconfirmation') }}</small>                                
                    </div>
                        

                    <hr class="custom-input">                        
                   
                    <div class="form-group row mb-0">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-50">
                                Change Password
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
