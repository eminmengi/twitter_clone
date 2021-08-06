<?php

use App\Http\Controllers\TweetController;
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
    Route::get('/',[TweetController::class,'index'])->name('index');
    Route::get('profile/{id}',[TweetController::class,'profile'])->name('profile');
    Route::post('create_tweet',[TweetController::class,'createTweet'])->name('create_tweet');
    Route::get('fav_tweet/{id}',[TweetController::class,'favTweet'])->name('fav_tweet');
    Route::get('retweet/{id}',[TweetController::class,'retweet'])->name('retweet');
    Route::get('follow/{id}',[TweetController::class,'follow'])->name('follow');
    Route::get('unfollow/{id}',[TweetController::class,'unfollow'])->name('unfollow');
});
require __DIR__.'/auth.php';

