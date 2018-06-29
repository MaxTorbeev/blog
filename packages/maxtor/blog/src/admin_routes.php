<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\Blog\Controllers\Admin',
    'middleware' => 'web'
], function() {
    Route::resource('posts', 'PostsController', ['as' => 'admin']);
});