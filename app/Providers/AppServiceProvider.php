<?php

namespace App\Providers;

use App\Models\Promotion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('components.navbar', function ($view){
            $notifications = Promotion::OrderByDESC( 'created_at')->where('status', '1')->get();
            $view->with('notifications', $notifications);
        });
    }
}
