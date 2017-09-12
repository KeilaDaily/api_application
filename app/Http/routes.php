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
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('Customer','Customer');

Route::resource('ContentAll','ContentAll');
Route::get('ContentAll/ShowContentAmount/{amount}','ContentAll@ShowContentAmount');
Route::get('ContentAll/ShowContentByCategory/{catId}','ContentAll@ShowContentByCategory');
Route::get('ContentAll/ShowContentAmountById/{newId}','ContentAll@ShowContentAmountById');

Route::resource('ShowContentByAllCategory','ShowContentByAllCategory');
Route::get('ShowContentByAllCategory/AmountContentOfEachCategory/{amount}','ShowContentByAllCategory@AmountContentOfEachCategory');


Route::resource('SlideShow','SlideShow');

Route::resource('Menu','Menu');
Route::get('/cache', function () {
    return Cache::get('key');
});