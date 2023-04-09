<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\UpdateProfileInformationController;

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

Route::get('/', WelcomeController::class)->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/timeline', TimelineController::class)->name('timeline');
    Route::post('/status', [StatusController::class, 'store'])->name('status.store');

    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function () {
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');

        Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change.password');
        Route::post('change-password', [ChangePasswordController::class, 'store']);

        Route::get('{user}/{follows}', [FollowingController::class, 'index'])->name('follows.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('follows.store');
        Route::get('{user}', ProfileInformationController::class)->withoutMiddleware('auth')->name('profile');
    });
});

require __DIR__ . '/auth.php';
