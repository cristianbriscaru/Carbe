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
    return view('home');
});
Auth::routes();

Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::get('/user/show', 'UserController@show')->name('user.show');
Route::get('/user/changepassword', 'UserController@showChangePassword')->name('user.showchangepassword');
Route::post('/user/changepassword', 'UserController@changePassword')->name('user.changepassword');
Route::delete('/user', 'UserController@destroy')->name('user.destroy');
Route::patch('/user', 'UserController@update')->name('user.update');




Route::get('/seller/show', 'SellerController@show')->name('seller.show');
Route::get('/seller/create', 'SellerController@create')->name('seller.create');
Route::post('/seller', 'SellerController@store')->name('seller.store');
Route::get('/seller/{seller}/edit', 'SellerController@edit')->name('seller.edit');
Route::delete('/seller/{seller}', 'SellerController@destroy')->name('seller.destroy');
Route::patch('/seller/{seller}', 'SellerController@update')->name('seller.update');

Route::get('/car', 'AdvertController@index')->name('advert.index');
Route::get('/car/create', 'AdvertController@create')->name('advert.create');
Route::post('/car', 'AdvertController@store')->name('advert.store');
Route::post('/vehiclelookup', 'AdvertController@vehicleLookUp')->name('vehiclelookup');
Route::post('/modelslookup', 'AdvertController@modelsLookUp')->name('modelslookup');
Route::get('/car/{advert}', 'AdvertController@show')->name('advert.show');
Route::get('/car/{advert}/edit', 'AdvertController@edit')->name('advert.edit');
Route::delete('/car/{advert}', 'AdvertController@destroy')->name('advert.destroy');
Route::patch('/car/{advert}', 'AdvertController@update')->name('advert.update');

Route::get('/search', 'SearchController@index')->name('search.index');
Route::get('/search/create', 'SearchController@create')->name('search.create');
Route::post('/search', 'SearchController@store')->name('search.store');
Route::get('/search/results', 'SearchController@results')->name('search.results');
Route::delete('/search/{search}', 'SearchController@destroy')->name('search.destroy');

Route::post('/subscription', 'SubscriptionController@store')->name('subscription.store');
Route::delete('/subscription/{subscription}', 'SubscriptionController@destroy')->name('subscription.destroy');
Route::get('/subscription', 'SubscriptionController@index')->name('subscription.index');

Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');
Route::post('/favorite', 'FavoriteController@store')->name('favorite.store');
Route::delete('/favorite/{favorite}', 'FavoriteController@destroy')->name('favorite.destroy');

Route::get('/recent', 'RecentController@index')->name('recent.index');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@show')->name('dashboard');

Route::get('/contact/create', 'ContactController@create')->name('contact.create');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/help', function () {
    return view('help.show');
})->name('help');
Route::get('/about', function () {
    return view('about.show');
})->name('about');