<?php

namespace MaxTor\Blog;

use Illuminate\Support\ServiceProvider;
use MaxTor\Blog\Models\Post;

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

        $this->app->singleton('blog::install', function () {
            return new \MaxTor\Blog\Commands\BlogCommand();
        });

        $this->commands('blog::install');

        $this->loadViewsFrom(__DIR__ . '/views', 'blog');

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
        view()->composer('pages.home', function ($view) {

            $posts = Post::published();
            $view->with('posts', $posts->get());

        });
    }

}
