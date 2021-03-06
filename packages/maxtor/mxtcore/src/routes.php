<?php

Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Панель управления', route('dashboard'));
});

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\MXTCore\Controllers',
    'middleware' => 'web'
], function() {

    Route::get('/', [
        'as'    => 'dashboard',
        'uses'  => 'DashboardController@startpage'
    ]);
//
//    Route::get('/editor/upload-image', [
//        'as'    => 'editor.image-dialog',
//        'uses'  => 'DashboardController@imageUpload'
//    ]);
//
//    Route::post('/editor/upload-image', [
//        'as'    => 'editor.image-dialog',
//        'uses'  => 'DashboardController@imageUpload'
//    ]);
//
//    Route::get('/{alias?}/{method?}/{id?}', [
//        'as'    => 'dashboard.components',
//        'uses'  => 'DashboardController@loadComponents'
//    ])->middleware('check.role:root');
//
//    Route::post('/menu/menu-type/store', [
//        'as'    => 'menutype.create',
//        'uses'  => 'MenuController@menuTypeStore'
//    ]);

    Route::resource('/extensions', 'ExtensionsController');
    Route::resource('/menu', 'MenuController', ['as' => 'admin']);
    Route::resource('/menu-types', 'MenuTypesController', ['as' => 'admin']);
    Route::resource('/users', 'UsersController', ['as' => 'admin']);
});

/**
 * Breadcrumbs
 * @docs https://github.com/davejamesmiller/laravel-breadcrumbs/tree/master
 */
// Admin > Menu
Breadcrumbs::for('admin.menu', function ($trail) {
    $trail->parent('admin');
    $trail->push('Пункты меню', route('admin.menu.index'));
});

// Admin > Menu > Edit
Breadcrumbs::for('admin.menu.edit', function ($trail, $menu) {
    $trail->parent('admin.menu');
    $trail->push($menu->name, route('admin.menu.index', ['id' => $menu->id]));
});

// Admin > Menu types
Breadcrumbs::for('admin.menu-types', function ($trail) {
    $trail->parent('admin');
    $trail->push('Типы меню', route('admin.menu.index'));
});

// Admin > Menu types > Edit
Breadcrumbs::for('admin.menu-types.edit', function ($trail, $menuType) {
    $trail->parent('admin.menu-types');
    $trail->push($menuType->name, route('admin.menu-types.edit', ['id' => $menuType->id]));
});
