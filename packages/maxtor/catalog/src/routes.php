<?php

Route::group([
    'prefix' => 'catalog',
    'namespace' => 'MaxTor\Catalog\Controllers',
    'middleware' => 'web'
], function() {

    Route::resource('/', 'CatalogController',
        ['names' => [
                'index'     => 'catalog.index',
                'store'     => 'catalog.store',
                'update'    => 'catalog.update',
                'destroy'   => 'catalog.destroy',
            ]
        ]);

});