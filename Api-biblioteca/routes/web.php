<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros', 'LibrosController@listarTodos');
Route::get('/libros/autor/{autor}', 'LibrosController@listarPorAutor');
Route::get('/libros/genero/{genero}', 'LibrosController@listarPorGenero');
Route::get('/libros/prestados', 'LibroPrestadoController@listarPrestados');
Route::get('/libros/prestados/{id}', 'LibroPrestadoController@listarPrestadosUser');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
