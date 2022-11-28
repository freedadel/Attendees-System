<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Email;
use App\Models\Order;
use App\Models\Donation;
use Carbon\Carbon;

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
        Carbon :: setLocale ("ar");
        view()->composer('layouts.masterPage_dashboard', function($view)
        {
            $waiting_donations = [];
            $waiting_orders = [];
            $view->with('emails', [])->with('waiting_donations',$waiting_donations)->with('waiting_orders',$waiting_orders);
        });
        
    }
}
