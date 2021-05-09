<?php

// DB::listen(function ($query) {
//     var_dump($query->sql, $query->bindings);
// });

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
})->name('landing');

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return redirect('/tweets');
    });

    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetsController::class, 'store']);

    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'like']);
    Route::post('/tweets/{tweet}/dislike', [TweetLikesController::class, 'dislike']);
    Route::post('/tweets/{tweet}/reset', [TweetLikesController::class, 'reset']);

    Route::post(
        '/profiles/{user:username}/follow',
        [FollowsController::class, 'store']
    )->name('follow');

    Route::delete('/tweets/{tweet}', [TweetsController::class, 'destroy'])->name('delete-tweet');
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

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
});

//Route::post('/alert', function () {
//    return back()->with('info','Item 1 created successfully !');
//});

Route::get(
    '/profiles/{user:username}',
    [ProfilesController::class, 'show']
)->name('profile');

Auth::routes();
