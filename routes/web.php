<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/*  home */
Route::get('/', [
     'uses' => '\Gallery\Http\Controllers\HomeController@index',
    'as'=> 'home',
]);

/*  Auth */

Route::get('/signup', [
     'uses' => '\Gallery\Http\Controllers\AuthController@getSignup',
    'as'=> 'auth.signup',
    'middleware' =>['guest']
]);
Route::post('/signup', [
     'uses' => '\Gallery\Http\Controllers\AuthController@postSingup',
     'middleware' =>['guest']
]);

Route::get('/signin', [
     'uses' => '\Gallery\Http\Controllers\AuthController@getSignin',
    'as'=> 'auth.signin',
    'middleware' =>['guest']
]);
Route::post('/signin', [
     'uses' => '\Gallery\Http\Controllers\AuthController@postSignin',
     'middleware' =>['guest']
]);

Route::get('/login', [
     'uses' => '\Gallery\Http\Controllers\AuthController@getSignin',
    'as'=> 'auth.signin',
    'middleware' =>['guest']
]);
Route::post('/login', [
     'uses' => '\Gallery\Http\Controllers\AuthController@postSignin',
     'middleware' =>['guest']
]);


Route::get('/signout', [
     'uses' => '\Gallery\Http\Controllers\AuthController@getSignout',
    'as'=> 'auth.signout',
    ]);
/* SEARCH */

Route::get('/search',[
    'uses' => '\Gallery\Http\Controllers\SearchController@getResoults',
    'as'=> 'search.resoults',
]);

/*PROFILE*/
Route::get('/user/{username}',[
    'uses' => '\Gallery\Http\Controllers\ProfileController@getProfile',
    'as'=> 'profile.index',
    'middleware' =>['auth'],
]);

Route::get('/profile/edit',[
    'uses' => '\Gallery\Http\Controllers\ProfileController@getEdit',
    'as'=> 'profile.edit',
    'middleware' =>['auth'],
]);

Route::post('/profile/edit', [
     'uses' => '\Gallery\Http\Controllers\ProfileController@postEdit',
     'middleware' =>['auth'],
]);


/*FRIENDS*/
Route::get('/friends',[
    'uses' => '\Gallery\Http\Controllers\FriendController@getIndex',
    'as'=> 'friends.index',
    'middleware' =>['auth'],
    
]);

Route::get('/friends/add/{username}',[
    'uses' => '\Gallery\Http\Controllers\FriendController@getAdd',
    'as'=> 'friends.add',
    'middleware' =>['auth'],
    
]);

Route::get('/friends/accept/{username}',[
    'uses' => '\Gallery\Http\Controllers\FriendController@getAccept',
    'as'=> 'friends.accept',
    'middleware' =>['auth'],
    
]);

/* STATUS */

Route::post('/status', [
     'uses' => '\Gallery\Http\Controllers\StatusController@postStatus',
     'as'=> 'status.post',
     'middleware' =>['auth'],
]);

Route::post('/status/{statusId}/reply', [
     'uses' => '\Gallery\Http\Controllers\StatusController@postReply',
     'as'=> 'status.reply',
     'middleware' =>['auth'],
]);