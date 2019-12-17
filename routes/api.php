<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('like/{id}', function ($id) {
    $likeController = new \App\Http\Controllers\LikeController();
    return json_encode($likeController->countLikes($id));
});

Route::get('/events/{name}', function($name) {
    $searchController = new \App\Http\Controllers\SearchController();
    return $searchController->search($name);
});

Route::get('/events', function() {
    $searchController = new \App\Http\Controllers\SearchController();
    return $searchController->getAll();
});
