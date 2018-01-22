<?php

namespace Sebbaum\Legal;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class LegalServiceProvider extends BaseServiceProvider
{

    /**
     * Bootstrap any application services.
     * This method is called after all other service providers have been registered.
     *
     * @return void
     */
    public function boot()
    {
        $this->addRoutes();
        $this->addResources();
        $this->addMigrations();
        $this->defineAssetPublishing();
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
     * Add the view resources for this package.
     */
    private function addResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'legal');
    }

    /**
     * Add the migrations for this package.
     */
    private function addMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }

    /**
     * Define the asset publishing configuration.
     *
     * @return void
     */
    public function defineAssetPublishing()
    {
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/legal'),
        ], 'legal-assets');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
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