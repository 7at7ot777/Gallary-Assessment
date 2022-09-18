<?php

use Illuminate\Support\Facades\Route;

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

######## Start Login And Register ########
Route::get('login', '\App\Http\Controllers\UserController@login')->name('login');
Route::post('checkLogin', '\App\Http\Controllers\UserController@checkLogin');
Route::get('register', '\App\Http\Controllers\UserController@register');
Route::post('checkRegister', '\App\Http\Controllers\UserController@checkRegister');
Route::get('logout', '\App\Http\Controllers\UserController@logout');

######## End Login And Register ########
Route::middleware('auth')->group(function () {


########### Start Album ###########

    Route::get('AddAlbum', '\App\Http\Controllers\AlbumController@AddAlbum');
    Route::post('StoreAlbum', '\App\Http\Controllers\AlbumController@StoreAlbum')->name('StoreAlbum');
    Route::get('AllAlbum', '\App\Http\Controllers\AlbumController@index');
    Route::get('DeleteAlbum/{id}', '\App\Http\Controllers\AlbumController@DeleteAlbum')->name('DeleteAlbum');
    Route::get('EditAlbum/{album}', '\App\Http\Controllers\AlbumController@EditAlbum')->name('EditAlbum');//view edit form
    Route::post('UpdateAlbum/{album}', '\App\Http\Controllers\AlbumController@UpdateAlbum')->name('UpdateAlbum');
########### End Album ############

//-----------------------------------
########### Start Image ###########
Route::get('image/index/{album_id}','\App\Http\Controllers\ImageController@index')->name('image.index');
Route::get('image/create','\App\Http\Controllers\ImageController@create');
Route::post('image/store','\App\Http\Controllers\ImageController@store')->name('store');
Route::get('image/destroy/{id}','\App\Http\Controllers\ImageController@destroy')->name('image.destroy');

########### End Image ###########

});
