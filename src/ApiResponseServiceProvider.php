<?php

namespace Lordsling\ApiResponse;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('api-response.php'),
        ]);

        $this->app->bind('api', function(){
            return new ApiResponse();
        });

        $this->registerHelpers();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'api-response'
        );

        $this->app->bind('api', function($app) {
            return new ApiResponse();
        });
    }

    /**
     * Register helpers.
     */
    protected function registerHelpers()
    {
        if (file_exists($helperFile = __DIR__.'/helpers.php')) {
            require_once $helperFile;
        }
    }
}
