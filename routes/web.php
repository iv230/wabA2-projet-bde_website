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

Route::resource('adminshop', 'ArticleController');
//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoryController');
Route::resource('purchases', 'PurchaseController');
Route::resource('basket', 'BasketController');
Route::resource('toHave', 'ToHaveController');
Route::resource('toContain', 'ToContainController');
Route::resource('shop', 'PublicArticlesController');
Route::post('/shop/{id}/addtocart', 'PublicArticlesController@addtocart');
Route::get('/adminshop/{id}/delete', 'ArticleController@destroy');

Route::resource('adminevents', 'EventController')->middleware('App\Http\Middleware\AdminEventAuth');
Route::resource('publicevents', 'PublicEventController');
Route::resource('comments', 'CommentController');
Route::get('participants', 'ParticipantController@index');
Route::get('participants/{id_event}', 'ParticipantController@show');
Route::post('participants', 'ParticipantController@createParticipant');

Route::get('publicevents/{id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);

Route::resource('/users', 'UserController')->middleware('App\Http\Middleware\UserAuth');
Route::get('/login', 'UserController@login');
Route::post('/users/connect', 'UserController@connect');
Route::get('/logout', 'UserController@logout');

