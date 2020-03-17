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

/**
 * api routes
 * posts routes
 */
Route::middleware('auth:api')->group(function () {
    Route::get('/post', 'PostController@posts');
    Route::post('/post', 'PostController@store');
    Route::post('/postImage', 'PostController@storeWithImage');
    Route::post('/postVideo', 'PostController@storeWithVideo');
});

/**
 * api routes
 * messages routes
 */
Route::middleware('auth:api')->group(function () {
    Route::get('/messages/contacts', 'MessageController@getAllContacts');
    Route::post('/messages/seen', 'MessageController@mark_seen');
});

/**
 * api routes
 * conversation routes
 */
Route::middleware('auth:api')->group(function () {
    Route::post('/conversation', 'MessageController@getConversation');
    Route::post('/conversation/message', 'MessageController@sendConversationMessage');
});
