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
    return view('template_welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('adminshop', 'ArticleController');
Route::resource('categories', 'CategoryController');
Route::resource('purchases', 'PurchaseController');
Route::resource('baskets', 'BasketController');
Route::resource('toHave', 'ToHaveController');
Route::resource('shop', 'PublicArticlesController');
Route::get('/adminshop/{id}/delete', 'ArticleController@destroy');

Route::resource('adminevents', 'EventController');
Route::resource('publicevents', 'PublicEventController');
Route::resource('comments', 'CommentController');
Route::get('publicevents/{id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);
Route::get('adminevents/{id}/delete', 'EventController@destroy');

Route::resource('/users', 'UserController');
Route::get('/login', 'UserController@login');
Route::post('/users/connect', 'UserController@connect');
Route::get('/logout', 'UserController@logout');
