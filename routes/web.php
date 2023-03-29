<?php

use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/timeline', TimelineController::class)->name('timeline');
    Route::post('/status', [StatusController::class, 'store'])->name('status.store');

    Route::get('profile/{user}/following', [FollowingController::class, 'following'])->name('profile.following');
    Route::get('profile/{user}/follower',[FollowingController::class, 'follower'])->name('profile.follower');

    Route::get('profile/{user}', ProfileInformationController::class)->withoutMiddleware('auth')->name('profile');
});

require __DIR__ . '/auth.php';
