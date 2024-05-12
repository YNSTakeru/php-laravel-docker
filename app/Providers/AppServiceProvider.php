<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Validator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Validator::extend('unique_in_array', function ($attribute, $value, $parameters, $validator) {
            if(is_array($value) || $value instanceof \Countable) {
                return count($value) === count(array_unique($value));
            } else {
                return false;
            }
        });

        if (env('APP_ENV') == 'production') {
            $url->forceScheme('https');
        }
    }
}
