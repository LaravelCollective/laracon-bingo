<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('login', function () {
    return view('auth.login');
})->middleware('guest');

Route::group([
    'prefix'    => 'auth',
    'namespace' => 'Auth',
], function () {
    Route::get('redirect', 'SocialiteController@redirectToProvider')->middleware('guest');
    Route::get('logout', 'SocialiteController@logout')->middleware('auth');
    Route::get('github', 'SocialiteController@github')->middleware('guest');
    Route::get('facebook', 'SocialiteController@facebook')->middleware('guest');
});

Route::group([
    'prefix' => 'api',
    'middleware' => 'auth',
], function () {
    Route::get('me', function() {
        return auth()->user();
    });

    Route::post('user-term/{term}/toggle', function (App\UserTerms $term) {
        if (auth()->user()->id != $term->user_id) {
            abort(403);
        }

        $term->toggleChecked();

        return $term;
    });
});
