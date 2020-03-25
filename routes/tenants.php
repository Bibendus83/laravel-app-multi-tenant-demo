<?php

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\')
    ->group(function ()
    {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/test', 'TestController@index')->name('test');

        Auth::routes();

        // Route::get('/logged', 'HomeController@logged')->name('logged');
    });
