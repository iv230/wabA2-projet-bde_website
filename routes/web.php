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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticleController');
Route::resource('categories', 'CategoryController');

Route::resource('adminevents', 'EventController');
Route::resource('publicevents', 'PublicEventController');
Route::resource('comments', 'CommentController');
Route::get('publicevents/{id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);
Route::get('adminevents/{id}/delete', 'EventController@destroy');

Route::resource('/users', 'UserController');
