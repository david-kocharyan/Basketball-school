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
 * Website Links
 */

Route::get('/', 'Site\HomeController@index');
Route::get('/about-us', 'Site\AboutController@index');
Route::get('/academy-members', 'Site\AcademyMembersController@index');
Route::get('/contact-us', 'Site\ContactController@index');
Route::get('/gallery', 'Site\GalleryController@index');
Route::get('/gallery/{id}', 'Site\GalleryController@gallery');
Route::get('/shop', 'Site\ShopController@index');
Route::get('/shop/{slug}', 'Site\ShopController@category');

Route::post('/home-gallery-ajax', 'Site\GalleryController@home_ajax');
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
Route::get('/sign-in', 'Site\AuthController@signIn');
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
    Route::resource('categories', 'CategoryController');
    Route::resource('/partners', 'PartnerController');

    Route::delete('/products/{product_id}/destroy-image/{id}', 'ProductController@destroy_image');
    Route::resource('products', 'ProductController');

    Route::delete('/gallery/{gallery_id}/destroy-image/{id}', 'GalleryController@destroy_image');
    Route::resource('gallery', 'GalleryController');

    Route::resource('month-players', 'MonthPlayerController');
    Route::resource('gallery-home', 'HomeGalleryController');
    Route::resource('partners', 'PartnerController');
    Route::resource('about-us-team', 'OurTeamController');
    Route::resource('about-us-story', 'AboutController');

    Route::resource('clubs', 'ClubController');

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
    Route::get('/', "Site\PlayerController@index");
    Route::post('settings', "Site\PlayerController@settings");
});
