<?php

namespace Sebbaum\Legal;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LegalServiceProvider extends BaseServiceProvider
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
            'prefix' => config('legal.uri', 'legal'),
            'namespace' => 'Sebbaum\Legal\Http\Controllers',
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
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'legal');
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
        $this->mergeConfigFrom(__DIR__ . '/../config/legal.php', 'legal');
    }

    /**
     * Publish package's configs and views.
     */
    private function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../config/legal.php' => config_path('legal.php')
        ], 'legal-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/legal'),
        ], 'legal-views');
    }
}