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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pizza', 'PizzaController@index');
Route::post('/pizzas', 'PizzaController@store');
Route::get('/ajax', 'PizzaController@ajax_load');
Route::get('/load', 'PizzaController@content_for_ajax');
// Route::post('/ajax', 'AjaxloadController@show');
Route::get('/pizza/create', 'PizzaController@create')->name('order_pizza');
Route::get('/pizza/{id}', 'PizzaController@show');