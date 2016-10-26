<?php

namespace MaxTor\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include_once __DIR__ . "/Commands/Command.php";

        $this->app->register('MaxTor\MXTCore\MXTCoreServiceProvider');

        $this->app['blog::install'] = $this->app->share(function () {
            return new \MaxTor\Blog\Commands\BlogCommand();
        });

        $this->commands('blog::install');

        $this->loadViewsFrom(__DIR__.'./views', 'blog');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('packages/maxtor/blog')
        ]);

        //Routes
        include __DIR__ . '/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
//        $router->group([
//            'namespace' => $this->namespace, 'middleware' => 'web',
//        ], function ($router) {
//            require __DIR__.'/routes.php';
//        });
    }
}
