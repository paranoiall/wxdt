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

Auth::routes(['register' => false]);
Route::get('/', 'HomeController@index');

Route::post('wxlogin', 'main@login');
Route::get('question/{userid}', 'main@question');
Route::post('answer/{userid}', 'main@answer');
