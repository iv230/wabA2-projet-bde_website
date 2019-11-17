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
Route::resource('articles', 'ArticleController');
Route::resource('categories', 'CategoryController');
Route::get('/articles/{id}/delete', 'ArticleController@destroy');

Route::resource('adminevents', 'EventController');
Route::resource('publicevents', 'PublicEventController');
Route::resource('comments', 'CommentController');
Route::get('participants', 'ParticipantController@index');
Route::get('participants/{id_event}', 'ParticipantController@show');
Route::post('participants', 'ParticipantController@createParticipant');

Route::get('publicevents/{id}', ['as' => 'comments.store', 'uses' => 'CommentController@store']);
Route::post('publicevents/{id}','PublicEventController@toggleFavorite');

Route::resource('/users', 'UserController');
Route::get('/login', 'UserController@login');
Route::post('/users/connect', 'UserController@connect');
Route::get('/logout', 'UserController@logout');

Route::resource ('image', 'ImageController', [
    'only' => ['create', 'store', 'destroy', 'update']
]);
