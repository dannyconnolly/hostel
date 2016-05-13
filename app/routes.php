<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@get_login');
Route::post('/login', array('before' => 'csrf_json', 'uses' => 'AuthController@post_login'));
Route::get('/logout', 'AuthController@logout');
Route::resource('users', 'UserController');
Route::resource('membertypes', 'MemberTypeController');
Route::resource('hostels', 'HostelController');
Route::resource('members', 'MemberController');
Route::resource('eventtypes', 'EventTypeController');
Route::resource('events', 'EventController');
Route::resource('bookings', 'BookingController');
Route::resource('bookingitems', 'BookingItemController');
Route::post('checkout', array('as' => 'checkout', 'uses' => 'CartController@postCheckType'));
Route::resource('cart', 'CartController');
Route::get('/hostel-listings', 'PageController@getHostelListings');
Route::get('/event-listings', 'PageController@getEventListings');
