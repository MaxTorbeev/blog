<?php

Route::group([
    'prefix' => '/admin',
    'namespace' => 'MaxTor\MXTCore\Controllers',
    'middleware' => 'web'
], function() {

    Route::resource('/extensions', 'ExtensionsController');
    Route::resource('/{alias}', 'DashboardController');

});