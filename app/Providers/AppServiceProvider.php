<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

# Si se utiliza Linux comentar la siguiente linea
##########################################################
use Illuminate\Support\Facades\Schema;
##########################################################

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # Si se utiliza Linux comentar la siguiente linea
        ##########################################################
        Schema::defaultStringLength(191);
        ##########################################################
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
