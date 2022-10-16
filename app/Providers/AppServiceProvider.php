<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App\Models\comment;
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

    }
}
