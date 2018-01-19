<?php

namespace Sebbaum\Tos;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TosServiceProvider extends BaseServiceProvider
{

    /**
     * Boot the Package.
     */
    public function boot()
    {
        $this->addRoutes();
        $this->addResources();
    }

    /**
     * Add routes.
     */
    private function addRoutes()
    {
        Route::group([
            'prefix' => config('tos.uri', 'tos'),
            'namespace' => 'Sebbaum\Tos\Http\Controllers',
            'middleware' => 'web'
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Add the views for this package.
     */
    private function addResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tos');
    }

    /**
     * Do registration stuff.
     */
    public function register()
    {
        $this->configure();
        $this->publishFiles();
    }

    /**
     * Merge configurations.
     */
    private function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tos.php', 'tos');
    }

    /**
     * Publish package's configs and views.
     */
    private function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../config/tos.php' => config_path('tos.php')
        ], 'tos-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tos'),
        ], 'tos-views');
    }
}