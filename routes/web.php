<?php

// DB::listen(function ($query) {
//     var_dump($query->sql, $query->bindings);
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetLikesController;
use App\Http\Controllers\Auth\LoginController;

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

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return redirect('/tweets');
    });

    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetsController::class, 'store']);

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);

    Route::post(
        '/profiles/{user:username}/follow',
        [FollowsController::class, 'store']
    )->name('follow');

    Route::middleware('can:edit,user')->group(function () {
        Route::get(
            '/profiles/{user:username}/edit',
            [ProfilesController::class, 'edit']
        )->name('edit');

        Route::patch(
            '/profiles/{user:username}',
            [ProfilesController::class, 'update']
        );
    });

    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get(
    '/profiles/{user:username}',
    [ProfilesController::class, 'show']
)->name('profile');

Auth::routes();
