<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Auth::routes();
Route::get('profiles','ProfileController@index')->name('profiles.index')->middleware('auth');
Route::post('profiles','ProfileController@store')->name('profiles.store')->middleware('auth');
Route::get('profiles/create','ProfileController@create')->name('profiles.create')->middleware('auth');
Route::get('profiles/{profile}','ProfileController@show')->name('profiles.show')->middleware('auth');
Route::match(['PUT','PATCH'],'profiles/{profile}', 'ProfileController@update')->name('profiles.update')->middleware('auth');
Route::get('profiles/{profile}/edit','ProfileController@edit')->name('profiles.edit')->middleware('auth');
Route::delete('profiles/{profile}','ProfileController@destroy')->name('profiles.delete')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
