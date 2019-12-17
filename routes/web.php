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


// ===== Shop

Route::resource('adminshop', 'ArticleController');
Route::resource('categories', 'CategoryController');
Route::resource('purchases', 'PurchaseController');
Route::resource('basket', 'BasketController');
Route::resource('toHave', 'ToHaveController');
Route::resource('toContain', 'ToContainController');
Route::resource('shop', 'PublicArticlesController');
Route::post('/shop/{id}/addtocart', 'PublicArticlesController@addtocart');
Route::get('/adminshop/{id}/delete', 'ArticleController@destroy');


// ===== Events

Route::get('publicevents/{id}', 'PublicEventController@show')->middleware('App\Http\Middleware\ShowEvent:id');
Route::get('publicevents', ['as' => 'eventName', 'uses' => 'PublicEventController@route']);
Route::resource('publicevents', 'PublicEventController')->except([
    'index'
]);

Route::resource('adminevents', 'EventController')->middleware('App\Http\Middleware\AdminEventAuth');
Route::post('adminevents/{id}/lock', 'EventController@hide');

Route::post('/publicevents/postphoto', 'PublicEventController@storeImage');

Route::resource('comments', 'CommentController');

Route::get('participants', 'ParticipantController@index');
Route::get('participants/{id_event}', 'ParticipantController@show');
Route::post('participants', 'ParticipantController@createParticipant');

Route::post('like', 'LikeController@likeEvent');

Route::get('likeEvent/{id}', function ($id) {
    $likeController = new \App\Http\Controllers\LikeController();
    $likeController->likeEventByApi($id);
});


// ===== Users

Route::resource('/users', 'UserController');
Route::get('/login', 'UserController@login');
Route::post('/users/connect', 'UserController@connect');
Route::get('/logout', 'UserController@logout');


// ===== Footer

Route::view('/credits', 'credits');
Route::view('/cgv', 'cgv');

