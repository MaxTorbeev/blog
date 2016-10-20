<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('posts', 'PostsController');

Route::get('/home', 'HomeController@index');

Auth::routes();

