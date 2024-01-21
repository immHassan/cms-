<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RateableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateRatingsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_ratings_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_ratings_table.php'),
                ], 'migrations');
            }
        }
    }
}