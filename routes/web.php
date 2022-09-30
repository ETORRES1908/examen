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
Route::get('profiles','ProfileController@index')->name('profiles.index');
Route::post('profiles','ProfileController@store')->name('profiles.store');
Route::get('profiles/create','ProfileController@create')->name('profiles.create');
Route::get('profiles/{profile}','ProfileController@show')->name('profiles.show');
Route::match(['PUT','PATCH'],'profiles/{profile}', 'ProfileController@update')->name('profiles.update');
Route::get('profiles/{profile}/edit','ProfileController@edit')->name('profiles.edit');
Route::delete('profiles/{profile}','ProfileController@destroy')->name('profiles.delete');

Route::get('/home', 'HomeController@index')->name('home');
