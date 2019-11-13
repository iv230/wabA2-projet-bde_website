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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
Route::resource('categories', 'CategoryController');

Route::resource('adminevents', 'EventController');
Route::resource('publicevents', 'PublicEventController');
Route::resource('publicevents', 'CommentController@index');
Route::get('adminevents/{id}/delete', 'EventController@destroy');

Route::resource('/users', 'UserController');
