<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use App\Models\Sanctum\PersonalAccessToken;
use App\Util\TenantConnector;

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
        TenantConnector::connect();
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
