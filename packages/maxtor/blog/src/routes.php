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

    Route::resource('categories', 'CategoriesController',
        ['names' => [
            'index'     => 'categories.index',
            'show'      => 'categories.show',
            'edit'      => 'categories.edit',
            'store'     => 'categories.store',
            'update'    => 'categories.update',
            'destroy'   => 'categories.destroy',
            ]
        ]
    );

    Route::resource('tags', 'TagsController',
        ['names' => [
            'index'     => 'tags.index',
            'show'      => 'tags.show',
            'edit'      => 'tags.edit',
            'store'     => 'tags.store',
            'update'    => 'tags.update',
            'destroy'   => 'tags.destroy',
            ]
        ]
    );

    Route::post('posts/{alias}/photos', [
        'as' => 'store_photo_path',
        'uses' => 'PostsController@addPhoto'
    ]);

});