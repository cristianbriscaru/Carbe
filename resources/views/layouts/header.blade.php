<header class="top-nav">
    <div class="top-nav  fixed-top">
        <div class="custom-shadow">
            <b-dropdown id="drop-menu" variant="btn btn-outline-primary top-nav" no-caret >
                <template class="btn btn-outline-primary top-nav" slot="button-content"><i class="material-icons">dehaze</i></template>
                <b-dropdown-header class="d-none d-md-inline">Quick Links</b-dropdown-header>
                <b-dropdown-item href="{{route('register')}}"  class=" {{Request::is('register')  ? 'active' : ''}} ">Register</b-dropdown-item>
                <b-dropdown-item href="{{route('login')}}"  class=" {{Request::is('login')  ? 'active' : ''}} ">Login</b-dropdown-item>
                <b-dropdown-item href="{{route('advert.create')}}"  class=" {{( Request::is('seller/create') || Request::is('car/create') ) ? 'active' : '' }} ">Sell</b-dropdown-item>
                <b-dropdown-item href="{{route('search.create')}}"  class=" {{( Request::is('search/create') || Request::is('search/results') ) ? 'active' : ''}} ">Buy</b-dropdown-item>
                <b-dropdown-item href="{{route('dashboard')}}"  class=" {{Request::is('dashboard') ? 'active' : ''}} ">Dashboard</b-dropdown-item>
                <b-dropdown-item href="{{route('user.show')}}"  class=" {{Request::is('user/show')  || Request::is('user/edit') ? 'active' : ''}} ">User Profile</b-dropdown-item>
                <b-dropdown-item href="{{route('seller.show')}}"  class=" {{Request::is('seller/show')  || Request::is('seller/edit') ? 'active' : ''}} ">Seller Profile</b-dropdown-item>
                <b-dropdown-item href="{{route('advert.index')}}"  class=" {{Request::is('car')  || Request::is('car/edit') ? 'active' : ''}} ">Car Adverts</b-dropdown-item>
                <b-dropdown-item href="{{route('favorite.index')}}"  class=" {{Request::is('favorite')  ? 'active' : ''}} ">Favorites </b-dropdown-item>
                <b-dropdown-item href="{{route('recent.index')}}"  class=" {{Request::is('recent')  ? 'active' : ''}} ">Recent Cars</b-dropdown-item>
                <b-dropdown-item href="{{route('search.index')}}"  class=" {{Request::is('search')  ? 'active' : ''}} ">Searches</b-dropdown-item>
                <b-dropdown-item href="{{route('subscription.index')}}"  class=" {{Request::is('subscription')  ? 'active' : ''}} ">Subscriptions</b-dropdown-item>
                <b-dropdown-item href="{{route('help')}}"  class=" {{Request::is('help')  ? 'active' : ''}} ">Help</b-dropdown-item>
                <b-dropdown-item href="{{route('about')}}"  class=" {{Request::is('about')  ? 'active' : ''}} ">About Us</b-dropdown-item>
                <b-dropdown-item href="{{route('contact.create')}}"  class=" {{Request::is('contact')  ? 'active' : ''}} ">Contact Us</b-dropdown-item>
                <b-dropdown-item href="{{route('user.showchangepassword')}}"  class=" {{Request::is('changepassword')  ? 'active' : ''}} ">Change Password</b-dropdown-item>

            </b-dropdown>
            <head-app v-bind:auth="auth" v-bind:name="name"></head-app>
        </div>
        <b-collapse id="top-app" class="text-secondary custom-shadow">
            <div class="">
                <div class="card mt-0 pb-2 px-2 custom-shadow" >
                    
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </b-collapse>

    </div>
    <div class="menu  custom-shadow">
        <div class="nav-logo">
            
                <h1 class="menu mt-2 mb-3"><a href="{{ route('home') }}" class="menu"><img class="menu custom-shadow" src="{{ asset ('media/app/logocar.png') }}" width="65px" height="65px" alt="Vehicle Logo">Carbe <small class="menu"> Car Network</small></a></h1>
            
        </div>
        <div class="text-center  nav-menu">     
            <nav class="menu">
                <ul class="menu list-inline">
                    <li class="list-inline-item menu">
                        <a class="menu {{ ( Request::is('search/create') || Request::is('search/results') ) ? 'active-menu' : '' }} " href="{{ route('search.create') }}">Buy</a>
                    </li>
                    <li class="list-inline-item menu">
                        <a class="menu {{ ( Request::is('seller/create') || Request::is('car/create') ) ? 'active-menu' : '' }}" href="{{ route('advert.create') }}">Sell</a>
                    </li>
                    <li class="list-inline-item menu">
                        @php
                            $currentRoute=Route::currentRouteName();
                            $dashboardRoutes=['dashboard','user.show','user.edit','showchangepassword','seller.show','seller.edit','advert.index','advert.edit','search.index','subscription.index','favorite.index','recent.index'];
                            $activeClass= in_array($currentRoute,$dashboardRoutes) ? 'active-menu' : '' ;
                        @endphp
                        
                        <a class="menu {{$activeClass}} " href="{{ route('dashboard') }}">Dashboard</a>
                    </li>                    
                </ul>
            </nav>
        </div>
    </div>
</header>