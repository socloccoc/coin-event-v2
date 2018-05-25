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

Route::group(['namespace' => 'ApiController'], function() {
    Route::post('/events', 'EventApiController@filterEvents');
});

Route::post('/signin', 'UserController@signin');
Route::post('/register', 'UserController@register');

Route::get('/currentuser', [
    'uses' => 'UserController@currentUser',
    'middleware' => 'jwt.auth'
]);

Route::get('/events/{category_id}/{date}', [
    'uses' => 'EventController@getListEvent',
    'middleware'=> 'cors'
]);

Route::get('/getEventByName/{event_name}', [
    'uses' => 'EventController@getEventByName',
    'middleware'=> 'cors'
]);


