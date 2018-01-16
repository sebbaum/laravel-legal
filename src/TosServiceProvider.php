<?php

namespace Sebbaum\Tos;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TosServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->configure();

        $this->publishes([
            __DIR__ . '/../config/tos.php' => config_path('tos.php')
        ], 'tos-config');
    }

    private function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tos.php', 'tos');
    }
}