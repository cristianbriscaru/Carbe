@extends('layouts.master')

@section('content')
<div class="container-fluid w-100 dashboard-page">
    <div class="row">
        <div class="col-4 col-md-3 bg-secondary text-center  p-0">
            <p class="my-1 small-i "><a href="{{route('dashboard')}}"><i class="material-icons custom-color custom-shadow dashboard-page" v-b-tooltip.hover title="Dashboard">account_box</i></a></p>
            <ul class="list-group text-light dashboard-page pb-5 h-100">
                <li class="bg-custom list-group-item  my-2 text-truncate"><a href="{{route('user.show')}}" class="text-light" v-b-tooltip.hover title="User Profile"><i class="material-icons mr-md-3">person</i>{{auth()->user()->name }}  {{auth()->user()->surname}} </a></li>
                <li class=" my-2"><a class="btn btn-info w-100" href="{{ route('user.show') }}" role="button"><i class="material-icons mr-3">perm_contact_calendar</i>User Profile</a>  </li>
            @if(auth()->user()->seller()->exists())
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('seller.show') }}" role="button"><i class="material-icons mr-3">account_balance</i>Seller Profile</a>  </li>
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('advert.index') }}" role="button"><i class="material-icons mr-3">directions_car</i>Car    Adverts</a>  </li>
            @else
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('seller.create') }}" role="button"><i class="material-icons mr-3">account_balance</i>Seller Profile</a>  </li>
            @endif
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('favorite.index') }}" role="button"><i class="material-icons mr-3">star_border</i>Favorite  Cars</a>  </li>
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('recent.index') }}" role="button"><i class="material-icons mr-3">history</i>Recent    Cars</a>  </li>
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('subscription.index') }}" role="button"><i class="material-icons mr-3">rss_feed</i>Subscriptions </a>  </li>
                <li class="my-2"><a class="btn btn-info w-100" href="{{ route('search.index') }}" role="button"><i class="material-icons mr-3">youtube_searched_for</i>Searches</a>  </li>
            </ul>
        </div>
        <div class="col-8 col-md-9 justify-content-center">

@yield('resources')
            
        </div>
    </div>
</div>     



@endsection