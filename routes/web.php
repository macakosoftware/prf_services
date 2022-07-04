<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\FinanceiroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::group([

    'prefix' => 'api'

], function ($router) {
    // Autenticacao
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user-profile', 'AuthController@me');    

    // Financeiro
    Route::get('financeiro/','FinanceiroController@listarTodos');    
    Route::get('financeiro/{id}/', 'FinanceiroController@dadosID');   
    Route::put('financeiro/', 'FinanceiroController@salvarFinanceiro');
    Route::delete('financeiro/{id}', 'FinanceiroController@deletarID');
    Route::patch('financeiro/', 'FinanceiroController@atualizarFinanceiro');

    // Domínios
    Route::get('tiposmovimento/', 'FinanceiroController@listarTodosTipoMovimento');
    Route::get('formaspagamento/', 'FinanceiroController@listarTodasFormaPagto');
});
