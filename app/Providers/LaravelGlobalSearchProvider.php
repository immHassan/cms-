<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\LaravelGlobalSearch as LaravelGlobalSearchFacades;
use App\Services\LaravelGlobalSearch;

class LaravelGlobalSearchProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('global_search.php')
        ],'global_search_config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'global_search');

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('LaravelGlobalSearch', LaravelGlobalSearchFacades::class);
        });

        $this->app->bind('global_search', function ($app) {
            $config = $app['config'];
            $resources = collect($config->get('global_search.resources'));
            $search = new LaravelGlobalSearch($resources, $config);
            return $search;
        });
    }

    /**
     * @return string
     */
    protected function configPath()
    {
        return config_path('global_search.php');
    }
}
