<?php

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\')
    ->group(function ()
    {
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('/test', 'TestController@index')->name('test');

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');
    });