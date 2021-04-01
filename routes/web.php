<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('auth/login');
});

Auth::routes();

Route::get('/main', 'HomeController@index')->name('principal');
