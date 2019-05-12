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

Auth::routes();

Route::view('/home', 'home')->middleware('auth');

Route::get('threads/search', '\App\Actions\ThreadsSearch');
Route::get('threads', '\App\Actions\ThreadsIndex')->name('threads');
Route::get('threads/create', '\App\Actions\ThreadsCreate');
Route::get('threads/{channel}/{thread}', '\App\Actions\ThreadsShow');
Route::patch('threads/{channel}/{thread}', '\App\Actions\ThreadsUpdate');
Route::delete('threads/{channel}/{thread}', '\App\Actions\ThreadsDestroy');
Route::post('threads', '\App\Actions\ThreadsStore');
Route::get('threads/{channel}', '\App\Actions\ThreadsIndex');

Route::post('locked-threads/{thread}', '\App\Actions\ThreadsLock')->name('locked-threads.store');
Route::delete('locked-threads/{thread}', '\App\Actions\ThreadsUnlock')->name('locked-threads.destroy');

Route::get('/threads/{channel}/{thread}/replies', '\App\Actions\RepliesIndex');
Route::post('/threads/{channel}/{thread}/replies', '\App\Actions\RepliesStore');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::delete('/replies/{reply}', 'RepliesController@destroy')->name('replies.destroy');

Route::post('/replies/{reply}/best', 'BestRepliesController@store')->name('best-replies.store');

Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@store')->middleware('auth');
Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsController@destroy')->middleware('auth');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::get('/profiles/{user}/notifications', 'UserNotificationsController@index');
Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsController@destroy');

Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

Route::get('api/users', 'Api\UsersController@index');
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');
