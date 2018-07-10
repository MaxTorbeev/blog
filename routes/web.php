<?php


Route::get('/', function () {
    return view('pages.home');
});

//Route::get('/home', 'MaxTor\MXTCore\Controllers\SiteController@index');


Auth::routes();