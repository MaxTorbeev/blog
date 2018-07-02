<?php

namespace MaxTor\Content;

use Illuminate\Support\ServiceProvider;
use MaxTor\Content\Models\Post;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include_once __DIR__ . "/Commands/ContentCommand.php";

        $this->app->register('MaxTor\MXTCore\MXTCoreServiceProvider');

        $this->app->singleton('content::install', function () {
            return new \MaxTor\Content\Commands\ContentCommand();
        });

        $this->commands('content::install');

        $this->loadViewsFrom(__DIR__ . '/views', 'content');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('packages/maxtor/blog')
        ]);

        //Routes
        include_once __DIR__ . '/frontend_routes.php';
        include_once __DIR__ . '/admin_routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('pages.home', function ($view) {

            $posts = Post::published();
            $view->with('posts', $posts->get());

        });
    }

}
