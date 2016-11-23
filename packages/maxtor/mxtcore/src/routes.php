<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\MXTCore\Controllers',
    'middleware' => 'auth.basic'
], function() {

    Route::get('/', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@index'
    ]);

    Route::get('/{alias?}/{method?}', [
        'as'    => 'dashboard.components',
        'uses'  => 'DashboardController@loadComponents'
    ]);

    Route::resource('/extensions', 'ExtensionsController');
    Route::resource('/menu', 'MenuController');

});