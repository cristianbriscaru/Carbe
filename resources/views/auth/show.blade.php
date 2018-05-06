@extends('layouts.dashboard')
@section('title')
User Profile
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
</nav>
    <h2 class="text-center text-info mb-5">User Profile</h2> 
    <div class="row w-75 mx-auto bg-secondary rounded text-light text-center justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 py-5">
        <ul class="list-group mb-5 mt-3">
            <li class="list-group-item bg-custom my-2">{{$user->name}}</li>
            <li class="list-group-item bg-custom my-2">{{$user->surname}}</li>
            <li class="list-group-item bg-custom my-2">{{$user->email}}</li>
        </ul>
        <div class="row">
            <div class="col-4 p-0 px-md-2">
                <button type="submit" form="delete" value="Delete" class="btn btn-danger w-100">Delete</button>
            </div>
            <div class="col-4 p-0 px-md-2">
                <a class="btn btn-info w-100" href=" {{route('user.edit')}} " role="button">Edit</a>
            </div>
            <div class="col-4 p-0 px-md-2">
                <a class="btn btn-warning w-100" href=" {{route('user.showchangepassword')}} " role="button">Password</a>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" action=" {{route('user.destroy')}} " id="delete">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
    </form> 

@endsection