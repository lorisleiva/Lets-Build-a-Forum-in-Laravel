<?php

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