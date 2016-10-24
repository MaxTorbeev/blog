<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/home', 'HomeController@index');

Auth::routes();

