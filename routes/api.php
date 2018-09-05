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



Route::post('/search/categories','SearchController@nameSearchCategories');

Route::post('/select/categories','SearchController@selectCategories');

Route::post('/search/product/prefix','SearchController@productPrefix');

Route::post('/search/product','SearchController@nameSearchProducts');

Route::post('/search/nearby/shop','SearchController@nearbyShops');