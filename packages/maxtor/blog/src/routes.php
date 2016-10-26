<?php


Route::group([
    'prefix' => '/',
    'namespace' => 'MaxTor\Blog\Controllers',
    'middleware' => 'web'
], function() {

    Route::resource('posts', 'PostsController',
        ['names' => [
                'index'     => 'post.index',
                'show'      => 'post.show',
                'store'     => 'post.store',
                'update'    => 'post.update',
                'destroy'   => 'post.destroy',
            ]
        ]
    );

    Route::post('posts/{alias}/photos', [
        'as' => 'store_photo_path',
        'uses' => 'PostsController@addPhoto'
    ]);

});