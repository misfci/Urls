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
use App\Url;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/urls/index', 'UrlsController@index');
Route::get('/urls/create', 'UrlsController@create');
Route::post('/urls/store', 'UrlsController@store');
Route::get('/urls/{id}/show', 'UrlsController@show');
Route::get('/urls/{id}/edit', 'UrlsController@edit');
Route::patch('/urls/{id}/update', 'UrlsController@update')->name('urls.update');
Route::get('/urls/{id}/delete' , 'UrlsController@destroy');
