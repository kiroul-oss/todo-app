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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','todosController@index');
Route::group(['prefix'=>'todos'],function(){
    Route::get('/','todosController@index');
    Route::get('edit/{todo_id}','todosController@edit');
    Route::get('show/{todo_id}','todosController@show');
    Route::get('create','todosController@create');
    Route::post('store','todosController@store');
    Route::get('get/{todo_id}','todosController@get');
    Route::post('update/{todo_id}','todosController@update');
    Route::get('delete/{todo_id}','todosController@destroy');
    Route::get('complete/{todo_id}','todosController@completed');





});

