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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], static function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('registro', 'AuthController@register');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::apiResource('culturas', 'CulturasController');
Route::apiResource('pragas', 'PragasController');
Route::apiResource('produtos', 'ProdutosController');
Route::apiResource('produtos', 'ProdutosController');
Route::get('/dosagens/pdf', 'DosagensController@exportPdf');
Route::apiResource('dosagens', 'DosagensController');

