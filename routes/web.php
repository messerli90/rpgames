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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Route::get('how-it-works', [
    'uses' => 'PagesController@howItWorks',
    'as' => 'pages.how-it-works'
]);

Auth::routes();

Route::resource('home', 'UsersController');

Route::resource('challenges', 'ChallengesController');

Route::resource('reviews', 'ReviewsController');

Route::resource('favorites', 'FavoritesController');

Route::resource('videos', 'VideosController');
