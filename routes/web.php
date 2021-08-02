<?php

use App\Http\Controllers\TweetsController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/',[TweetsController::class,'index'])->name('index');
    Route::post('create_tweet',[TweetsController::class,'create_tweets'])->name('create_tweet');
    Route::get('fav_tweet/{id}',[TweetsController::class,'fav_tweet'])->name('fav_tweet');
    Route::get('retweet/{id}',[TweetsController::class,'retweet'])->name('retweet');
});
require __DIR__.'/auth.php';

