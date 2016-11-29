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

    Route::get('/{alias?}/{method?}/{id?}', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@loadComponents'
    ]);

    Route::post('/menu/menu-type/store', [
        'as'    => 'menutype.create',
        'uses'  => 'MenuController@menuTypeStore'
    ]);

    Route::resource('/extensions', 'ExtensionsController');
    Route::resource('/menu', 'MenuController');

});