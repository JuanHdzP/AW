<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('categorias','Api\ApicategoriasController');
Route::resource('detalles','Api\ApidetallesController');
Route::resource('facturas','Api\ApifacturasController');
Route::resource('productos','Api\ApiproductosController');
Route::resource('users','Api\ApiusersController');

Route::post('login','Auth\LoginController@login');
Route::post('register','Auth\RegisterController@register');



