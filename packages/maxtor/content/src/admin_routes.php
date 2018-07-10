<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\Content\Controllers\Admin',
    'middleware' => 'web'
], function() {
    Route::resource('posts', 'PostsController', ['as' => 'admin']);
    Route::resource('categories', 'CategoriesController', ['as' => 'admin']);
});

/**
 * Breadcrumbs
 * @docs https://github.com/davejamesmiller/laravel-breadcrumbs/tree/master
 */
// Admin > Content
Breadcrumbs::for('admin.content', function ($trail) {
    $trail->parent('admin');
    $trail->push('Контент менеджер', route('admin.posts.index'));
});

// Admin > Content > Posts
Breadcrumbs::for('admin.content.posts', function ($trail) {
    $trail->parent('admin.content');
    $trail->push('Статьи', route('admin.posts.index'));
});

// Admin > Content > Posts > Create
Breadcrumbs::for('admin.content.posts.create', function ($trail) {
    $trail->parent('admin.content.posts');
    $trail->push('Новая статья', route('admin.posts.create'));
});

// Admin > Content > Categories
Breadcrumbs::for('admin.content.categories', function ($trail) {
    $trail->parent('admin.content');
    $trail->push('Контент менеджер', route('admin.posts.index'));
});