<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
    // return view('auth/login');
});

Auth::routes();

Route::get('/main', 'HomeController@index')->name('principal');

// RUTAS: 

// Categorias routes ...
Route::get('categoria','CategoriaController@index');
Route::get('categoria/listpage','CategoriaController@listPagination');
Route::post('categoria/registrar','CategoriaController@store');
Route::put('categoria/actualizar','CategoriaController@update');
Route::put('categoria/desactivar','CategoriaController@desactivar');
Route::put('categoria/activar','CategoriaController@activar');