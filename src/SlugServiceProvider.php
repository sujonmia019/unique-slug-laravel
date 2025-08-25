<?php

namespace Myol\UniqueSlug;

use Illuminate\Support\ServiceProvider;

class SlugServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('unique-slug', function () {
            return new UniqueSlug();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/unique-slug.php',
            'unique-slug'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/unique-slug.php' => config_path('unique-slug.php'),
        ], 'config');
    }

}
