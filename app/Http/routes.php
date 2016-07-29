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

use App\UserTerms;
use Carbon\Carbon;

Route::get('/', function () {
    auth()->user()->getTermsAttribute();
    return view('index');
})->middleware('auth');

Route::get('admin', function () {
    auth()->user()->getTermsAttribute();
    return view('admin');
})->middleware(['auth', 'can:admin']);

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
  'prefix'     => 'api',
  'middleware' => 'auth',
], function () {
    Route::get('me', function () {
        $me = auth()->user();

        $me->load('terms.term');

        return $me;
    });

    Route::post('me/bingo', function () {
        $user = auth()->user();
        $user->load('terms.term');

        $user->submitted_at = Carbon::now();
        $user->save();

        return $user;
    });

    Route::post('user-term/{term}/toggle', function (UserTerms $term) {
        if (auth()->user()->id != $term->user_id) {
            abort(403);
        }

        $term->toggleChecked();

        return $term;
    });

    Route::get('users', 'UsersController@index')
      ->middleware('can:admin');
    Route::get('users/{user}', 'UsersController@show')
      ->middleware('can:admin');
    Route::get('terms', 'TermsController@index')
      ->middleware('can:admin');
    Route::post('terms/{term}/verify', 'TermsController@verify')
      ->middleware('can:admin');
});
