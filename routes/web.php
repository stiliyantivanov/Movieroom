<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/movies','MovieController@index')->name('movies');
Route::get('/movies/create','MovieController@create');
Route::get('/movies/{id}','MovieController@show')->name('movie');
Route::get('/movies/{id}/edit','MovieController@edit');
Route::post('/movies','MovieController@store');
Route::patch('/movies/{id}', 'MovieController@update');
Route::delete('/movies/{id}/destroy','MovieController@destroy');

Route::get('/series', 'SeriesController@index')->name('series');
Route::get('/series/create','SeriesController@create');
Route::get('/series/{id}','SeriesController@show')->name('single_series');
Route::get('/series/{id}/edit','SeriesController@edit');
Route::post('/series','SeriesController@store');
Route::patch('/series/{id}', 'SeriesController@update');
Route::delete('/series/{id}/destroy','SeriesController@destroy');

Route::get('/actors','ActorController@index')->name('actors');
Route::get('/actors/create','ActorController@create');
Route::get('/actors/{id}','ActorController@show')->name('actor');
Route::get('/actors/{id}/edit','ActorController@edit');
Route::post('/actors','ActorController@store');
Route::patch('/actors/{id}','ActorController@update');
Route::delete('/actors/{id}/destroy','ActorController@destroy');

Route::get('/tags','TagController@index')->name('tags');
Route::get('/tags/{id}','TagController@show');
Route::post('/tags','TagController@store');
Route::delete('/tags/{id}/destroy','TagController@destroy');

Route::get('/reviews/{movieId}/create','ReviewController@create');
Route::get('/reviews/{id}/edit','ReviewController@edit');
Route::post('/reviews/{movieId}','ReviewController@store');
Route::patch('/reviews/{id}','ReviewController@update');
Route::delete('/reviews/{id}','ReviewController@destroy');

Route::get('/users','UserController@index')->name('users');
Route::get('/users/{id}','UserController@show')->name('user');
Route::get('/users/{id}/edit','UserController@edit');
Route::patch('/users/{id}','UserController@update');




