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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

//

Route::get('/about', function(){
    return view('about',['articles'=>\App\Models\Article::take(3)->latest()->get()]);
});

Route::get('/articles/','\App\Http\Controllers\ArticlesController@index')->name('articles.index')->middleware('auth');
Route::post('/articles/','\App\Http\Controllers\ArticlesController@store')->name('articles.store')->middleware('auth');
Route::get('/articles/create/','\App\Http\Controllers\ArticlesController@create')->name('articles.create')->middleware('auth');

Route::get('/articles/{article}/','\App\Http\Controllers\ArticlesController@show')->name('articles.show')->middleware('auth');
Route::get('/articles/{article}/edit/','\App\Http\Controllers\ArticlesController@edit')->name('articles.edit')->middleware('auth');
Route::get('/articles/{article}/delete/','\App\Http\Controllers\ArticlesController@destroy')->name('articles.destroy')->middleware('auth');

Route::put('/articles/{article}/','\App\Http\Controllers\ArticlesController@update')->name('articles.update')->middleware('auth');

