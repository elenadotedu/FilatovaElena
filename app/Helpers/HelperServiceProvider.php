<?php

namespace App\Helpers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('viewHelper', function()
        {
            return new ViewHelper();
        });

        $this->app->singleton('formatHelper', function()
        {
            return new FormatHelper();
        });
    }
}