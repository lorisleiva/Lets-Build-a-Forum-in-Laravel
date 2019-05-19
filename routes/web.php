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

// Authentication routes.
Auth::routes();
Route::get('/register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

// Home pages.
Route::view('/', 'welcome');
Route::view('/home', 'home')->middleware('auth');

// Actions.
Route::actions(function () {
    Route::get('threads/search', 'ThreadsSearch');
    Route::get('threads', 'ThreadsIndex')->name('threads');
    Route::get('threads/create', 'ThreadsCreate');
    Route::get('threads/{channel}/{thread}', 'ThreadsShow');
    Route::patch('threads/{channel}/{thread}', 'ThreadsUpdate');
    Route::delete('threads/{channel}/{thread}', 'ThreadsDestroy');
    Route::post('threads', 'ThreadsStore');
    Route::get('threads/{channel}', 'ThreadsIndex');
    
    Route::post('locked-threads/{thread}', 'ThreadsLock')->name('locked-threads.store');
    Route::delete('locked-threads/{thread}', 'ThreadsUnlock')->name('locked-threads.destroy');
    
    Route::get('/threads/{channel}/{thread}/replies', 'RepliesIndex');
    Route::post('/threads/{channel}/{thread}/replies', 'RepliesStore');
    Route::patch('/replies/{reply}', 'RepliesUpdate');
    Route::delete('/replies/{reply}', 'RepliesDestroy')->name('replies.destroy');
    
    Route::post('/replies/{reply}/best', 'BestRepliesStore')->name('best-replies.store');

    Route::post('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsStore');
    Route::delete('/threads/{channel}/{thread}/subscriptions', 'ThreadSubscriptionsDestroy');

    Route::post('/replies/{reply}/favorites', 'FavoritesStore');
    Route::delete('/replies/{reply}/favorites', 'FavoritesDestroy');

    Route::get('/profiles/{user}', 'UsersShow')->name('profile');
    Route::get('/api/users', 'UsersIndex');
    Route::post('/api/users/{user}/avatar', 'UsersUpdateAvatar')->name('avatar');
    
    Route::get('/profiles/{user}/notifications', 'UserNotificationsIndex');
    Route::delete('/profiles/{user}/notifications/{notification}', 'UserNotificationsDestroy');
});
