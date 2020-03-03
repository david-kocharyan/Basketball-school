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

/**
 * welcome page
 */
Route::get('/', 'Site\HomeController@index');

/**
 * Parent authentication
 */
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

/**
 * Admin Login part
 */
Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm');
Route::post('/admin/login', 'Auth\LoginController@adminLogin')->name('admin_login');
Route::post('/admin/logout', 'Auth\LoginController@adminLogout')->middleware('auth:admin');

/**
 * Player Login part
 */
Route::get('/player/login', 'Auth\LoginController@showPlayerLoginForm');
Route::post('/player/login', 'Auth\LoginController@playerLogin')->name('player_login');
Route::post('/player/logout', 'Auth\LoginController@playerLogout')->middleware('auth:player');

/**
 * All admin route
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::resource('/', 'AdminsController');
    Route::resource('players', 'PlayersController');
    Route::resource('teams', 'TeamsController');
    Route::resource('coaches', 'CoachController');
    Route::resource('center', 'CenterController');
    Route::resource('league', 'LeagueController');
});

/**
 * all parent route
 */
Route::group(['prefix' => 'parent', 'middleware' => 'auth:web'], function () {
    Route::get('/', function () {
        dd(Auth::user());
    })->name('home');
});

/**
 * all players route
 */
Route::group(['prefix' => 'player', 'middleware' => 'auth:player'], function () {
    Route::get('/', function () {
        dd(Auth::user());
    });
});
