<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        // En todas las vistas se pasa el parametro channels
        \View::composer('*', function($view){
            $channels = \Cache::rememberForever('channels', function(){
                return Channel::all();
            });
            $view->with('channels', $channels);
        });
    }
}
