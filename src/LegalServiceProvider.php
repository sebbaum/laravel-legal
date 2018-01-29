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
        $this->addTranslations();
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

        Route::group([
            'prefix' => config('legal.api', 'legal/api'),
            'namespace' => 'Sebbaum\Legal\Http\Controllers',
            'middleware' => 'api'
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
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

    private function addTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'legal');
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
        /*
         * Publish configs
         */
        $this->publishes([
            __DIR__ . '/../config/legal.php' => config_path('legal.php')
        ], 'legal-config');

        /*
         * Publish views
         */
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/legal'),
        ], 'legal-views');

        /*
         * Publish languages/translations
         */
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/legal')
        ], 'legal-lang');
    }
}