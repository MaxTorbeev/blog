<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\Content\Controllers\Admin',
    'middleware' => 'web'
], function() {
    Route::resource('posts', 'PostsController', ['as' => 'admin']);
});