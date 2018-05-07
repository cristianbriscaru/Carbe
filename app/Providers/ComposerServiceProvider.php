<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cookie;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['advert.create','advert.edit','search.results','search.index','search.create','home'],
            function($view){
                $view->with('makes', \App\Make::pluck('make_name')->forget(117));
            }
        );
        view()->composer(
            ['home','search.create'],
            function($view){
                $view->with('searchQuery', json_decode(Cookie::get('saqp'),true));
            }
        );
        
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
