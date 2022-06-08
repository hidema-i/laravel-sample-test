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
//test1
Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);
//test2
Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class, 'showId']);
//test3 __invoke
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');

//test4 request
Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');
