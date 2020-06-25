<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'Chat\ChatController@index')->name('chat');
Route::get('/chat/messages', 'Chat\ChatMessageController@index');
Route::post('/chat/messages', 'Chat\ChatMessageController@store');
