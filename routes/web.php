<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('modulos', function () {
    // rotas acessadas apenas por usuarios logados

})->middleware('auth');

Route::resource('finances', 'FinanceController')->middleware('auth');
Route::resource('pagamentos', 'PagamentosController')->middleware('auth');

Route::resource('vendas', 'VendasController')->middleware('auth');

Route::resource('compras', 'ComprasController')->middleware('auth');

Route::resource('cadastros', 'CadastroController')->middleware('auth');

Route::resource('produtos', 'ProdutosController')->middleware('auth');

Route::resource('estoque', 'EstoqueController')->middleware('auth');

Route::resource('relatorios', 'RelatoriosController')->middleware('auth');

Route::resource('sistema', 'SistemaController')->middleware('auth');
Route::resource('operacoes', 'OperacoesController')->middleware('auth');
