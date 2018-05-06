@extends('layouts.master')
@section('title')
Reset Password
@endsection

@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
        </ol>
</nav> 
<div class="container">
        <h2 class="text-center text-info heading">Reset your Password</h2>
    <div class="row justify-content-center  ">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row custom-input">
                                <label for="email" class="col-sm-4 col-form-label col-form-label-lg custom-input"><i class="material-icons md-48 custom-input">email</i>Email<span class="text-danger"> *</span></label>
    
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control custom-input form-control-lg{{ $errors->has('email') ? ' invalid' : '' }}" name="email" placeholder="Enter Email here :" value="{{ old('email') }}" required autofocus v-validate="'required|email|max:255'">
                                    <small v-show="errors.has('email')" class="form-text invalid">@{{ errors.first('email') }}</small>
                                    @if ($errors->has('email'))
                                    <small v-if="(fields.email && fields.email.pristine)"  class="form-text custom-input invalid">
                                            {{ $errors->first('email') }}
                                        </small>
                                    @endif
                                </div>
                        </div>
                        <hr class="custom-input">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
