<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => '/v1'], function () {

    // Auth
    Route::post('/login', 'API\AuthController@login');
    Route::post('/logout', 'API\AuthController@logout');

    // Event
    Route::get('/events', 'API\EventController@index');
    Route::get('/organizers/{organizer_slug}/events/{event_slug}', 'API\EventController@show');

    // Registration
    Route::get('/registrations', 'API\RegistrationController@index')->middleware('jwt');
    Route::post('/organizers/{organizer_slug}/events/{event_slug}/registration', 'API\RegistrationController@store')->middleware('jwt');

});
