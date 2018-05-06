@include('layouts.head')

<body>
    <div class="w-100" id="app" v-cloak>
        <alert :alert="alert" position="fixed"></alert> 
            @include('layouts.header')

        <main class="content">
                
            
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>

    <script>
            window.alert=@json( session()->has('alert') ? session('alert') : false );
            window.auth=@json(Auth::check());
            window.name=@json(Auth::check() ? Auth::user()->name : false);
    </script>
    @stack('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
