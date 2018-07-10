<?php

namespace MaxTor\MXTCore;

use Illuminate\Support\ServiceProvider;
use MaxTor\MXTCore\Models\MenuType;

class MXTCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include_once __DIR__ . "/Commands/Command.php";

        $this->app->singleton('mxtcore::install', function () {
            return new  \MaxTor\MXTCore\Commands\MXTCoreCommand();
        });

        $this->commands('mxtcore::install');

        $this->loadViewsFrom(__DIR__.'/views', 'mxtcore');

        $this->publishes([
            __DIR__.'/config/mxtcore.php' => config_path('mxtcore.php'),
        ]);

        //Routes
        include __DIR__ . '/routes.php';

        $this->composeDashboardNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(base_path('resources/views/mxtcore'), 'mxtcore');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/mxtcore'),
        ]);
    }

    /**
     * Compose the navigation bar.
     *
     * @description Метод передает массив в partials.navigator при загрузке страницы.
     */
    public function composeDashboardNavigation()
    {
        view()->composer('mxtcore::dashboard.partials.sidebar', function ($view) {
            $dashboard = MenuType::whereSlug('dashboard')->firstOrFail();
            $view->with('dashboardMenu', $dashboard->menu()->where('parent_id', 0)->get());
        });
    }
}
