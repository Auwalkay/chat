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
    return view('welcome');
});

Route::get('/logout','Auth\LoginController@logout');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/private', 'HomeController@privateChat')->name('private');
Route::get('messages','MessageController@fetchMessages');
Route::post('message','MessageController@sendMessage');
Route::get('/users','HomeController@users');
Route::get('/user/friendRequest','FriendsController@index')->name('user.friends');
Route::get('/chats','HomeController@chats')->name('chats');
Route::get('/user/friendRequest/accept/{requestID}','FriendsController@acceptFriend')->name('meetup.accept');
Route::get('/user/friendRequest/decline/{requestID}','FriendsController@declineFriend')->name('meetup.decline');
Route::get('/user/friendRequest/cancel/{requestID}','FriendsController@cancelRequest')->name('meetup.cancel');


Route::get('/private-messages/{user}','MessageController@privateMessages')->name('privateMessages');
Route::post('/private-messages/{user}','MessageController@sendPrivateMessage')->name('sendPrivateMessages');

