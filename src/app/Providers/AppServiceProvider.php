<?php

namespace App\Providers;

use App\Interfaces\SocialMediaServiceInterfaces;
use App\Services\OrkutService;
use App\Services\TwitterService;
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
        $this->app->bind(SocialMediaServiceInterfaces::class, function () {
           return new TwitterService(env('API_KEY'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
