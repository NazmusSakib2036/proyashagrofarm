<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

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
        // Share site settings with all views to avoid undefined variable errors
        try {
            $setting = SiteSetting::first();
        } catch (\Throwable $e) {
            $setting = null;
        }

        View::share('setting', $setting);
    }
}
