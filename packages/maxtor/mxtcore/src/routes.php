<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\MXTCore\Controllers',
    'middleware' => 'web'
], function() {

    Route::get('/', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@index'
    ])->middleware('check.role:root');

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

});

Auth::routes();
