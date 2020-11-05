<?php

use Illuminate\Support\Facades\Route;

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
    if (Auth::guest())
        return redirect()->route('login');
    else
        return redirect()->route('events.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/organizer'], function () {

    // Events
    Route::resource('/events', 'EventController');

    // Ticket
    Route::resource('/events/{event}/tickets', 'TicketController');

    // Channel
    Route::resource('/events/{event}/channels', 'ChannelController');

    // Room
    Route::resource('/events/{event}/rooms', 'RoomController');
    Route::get('/events/{event}/room-capacity', 'RoomController@capacity')->name('rooms.capacity');

    // Session
    Route::resource('/events/{event}/sessions', 'SessionController');


});
