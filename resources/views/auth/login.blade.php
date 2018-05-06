@extends('layouts.master')
@section('title')
Login 
@endsection

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
</nav>
<div class="container">
    <h2 class="text-center text-info mb-5">Login to Carbe</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-sm-12 col-md-10">
                    <form id="login" method="POST" action="{{ route('login') }}" novalidate @submit.prevent="validateForm">
                        @csrf

                        <div class="form-group row custom-input">
                            <label for="email" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons md-48 custom-input">email</i>Email<span class="text-danger"> *</span></label>

                            <div class="col-7">
                                <input id="email" type="email" class="form-control form-control-lg custom-input{{ $errors->has('email') ? ' invalid' : '' }}" name="email" placeholder="Enter Email here :" value="{{ old('email') }}" required autofocus v-validate="'required|email|max:255'">
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
                            <label for="password" class="col-5 col-form-label col-form-label-lg custom-input"><i class="material-icons md-48 custom-input">lock</i>Password<span class="text-danger"> *</span></label>

                            <div class="col-7">
                                <input id="password" type="password" class="form-control form-control-lg custom-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Password here :" name="password" required v-validate="'required|min:6|max:255'" >
                                <small v-show="errors.has('password')" class="form-text custom-input invalid">@{{ errors.first('password') }}</small>
                                @if ($errors->has('password'))
                                <small v-if="(fields.password && fields.password.pristine)"  class="form-text custom-input invalid">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </div>
                            
                        </div>
                        <hr class="custom-input">
                        <div class="form-group row custom-input text-center">
                            <div class="col justify-content-center ">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                            <div class="col justify-content-center">
                                <div class="checkbox ">
                                    <label class="" id="remember">
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember') }}
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div id="login-help" class="form-group row custom-input text-center">
                            <div class="col justify-content-center">

                                <a class="btn btn-warning" href="{{ route('password.request') }}" role="button" aria-describedby="forgothelp">Forgot Password</a>
                                <small id="forgothelp" class="form-text text-muted ">Click Forgot Password to reset your password</small>
                            </div>
                            <div class="col  justify-content-center">

                                <a class="btn btn-info" href="{{ route('register') }}" role="button" aria-describedby="registerhelp">Register</a>
                                <small id="registerhelp" class="form-text text-muted">Click Register to register a new account</small>
                                </div>
                        </div>
                    </form>
        </div>
    </div>
</div>

@endsection

