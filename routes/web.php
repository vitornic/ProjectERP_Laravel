<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('principal/angular');
// });

// Route::get('/', function () {
//     return view('layouts.app');
// });

//Route::resource('user', 'usuarios_migration_Controller');

//Route::post('store', 'usuarios_migration_Controller@store');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('exemplo', function () {
    // rotas acessadas apenas por usuarios logados
})->middleware('auth');
