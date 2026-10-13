<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $root = env('FORCE_ASSET_ROOT');
        if (is_string($root) && $root !== '') {
            URL::forceRootUrl($root);
            URL::forceScheme('https');
        }
    }
}
