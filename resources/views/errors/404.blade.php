@extends('layouts.master')
@section('content')

<h2 class="text-center text-secondary my-5" >Looks like something went wrong.....</h2>

<img  src="{{asset('media/app/error.png')}}" alt="Error" width="400" height="300" class="mx-auto d-block">
<div class="w-100 row mx-auto my-5 justify-content-center ">
    <div class="col-6 text-right">
        <a class="btn btn-info px-5 mx-5 px-5 " href="http://carbe.co.uk" role="button">  Home  </a>
    </div>
    <div class="col-6 text-left">
        <a class="btn btn-info px-5  mx-5 px-5 " href="http://carbe.co.uk/help" role="button">  Help  </a>
    </div>
    </div>
</div>
@endsection