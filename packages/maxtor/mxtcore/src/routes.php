<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\MXTCore\Controllers',
    'middleware' => 'web'
], function() {

    Route::get('/', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@index'
    ]);

    Route::get('/editor/upload-image', [
        'as'    => 'editor.image-dialog',
        'uses'  => 'DashboardController@imageUpload'
    ]);

    Route::post('/editor/upload-image', [
        'as'    => 'editor.image-dialog',
        'uses'  => 'DashboardController@imageUpload'
    ]);

    Route::get('/{alias?}/{method?}/{id?}', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@loadComponents'
    ])->middleware('check.role:root');

    Route::post('/menu/menu-type/store', [
        'as'    => 'menutype.create',
        'uses'  => 'MenuController@menuTypeStore'
    ]);

    Route::resource('/extensions', 'ExtensionsController');
    Route::resource('/menu', 'MenuController');

    Route::resource('/users', 'UsersController');
});


Auth::routes();
