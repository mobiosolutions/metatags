<?php

namespace mobiosolutions\metatags\Providers;

use Illuminate\Support\ServiceProvider;

class MetatagsProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('Metatags', function() {
            return new \mobiosolutions\metatags\Metatags;
        });
    }
}