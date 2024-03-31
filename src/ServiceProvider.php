<?php

namespace FormComponentsForLaravel;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/form-components.php', 'form-components');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form-components');
    }

    private function bootBladeComponents(): void
    {
        foreach (config('form-components.components') as $alias => $componentClass) {
            Blade::component($componentClass, $alias);
        }
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/form-components.php' => $this->app->configPath('form-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/form-components'),
            ], 'views');
        }
    }
}
