<?php

namespace App\Providers;

use App\Post;
use App\Setting;
use Illuminate\Support\ServiceProvider;
use Morilog\Jalali\jDate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('jalali',jDate::forge());
        view()->composer('partial.footer','\App\Http\Composers\NavigationComposer');
        view()->composer('partial.nav','\App\Http\Composers\NavigationComposer@navbar');
        view()->composer('partial.slider','\App\Http\Composers\NavigationComposer@slider');
        view()->composer('pages.homepage','\App\Http\Composers\NavigationComposer@homepage');
        view()->composer('pages.post','\App\Http\Composers\NavigationComposer@post');
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