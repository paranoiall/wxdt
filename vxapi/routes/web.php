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

Route::get('control/csv', 'control@csv');
Route::post('control', 'control@postFile');

Route::get('control/{kind}', 'control@get');
Route::post('control/{kind}', 'control@post');
Route::put('control/{kind}', 'control@put');
Route::delete('control/{kind}', 'control@delete');

Route::get('result', 'control@score');
Route::get('result/{kind}', 'control@result');

Route::get('setting', 'control@getsetting');
Route::put('setting', 'control@putsetting');
