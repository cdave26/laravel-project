<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix'=>'ideas/', 'as'=>'ideas.', 'middleware' => ['auth']],function(){

  

    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function(){
        Route::post('', [IdeaController::class, 'store'])->name('store');

        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });

 

});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::resource('user', UserController::class)->only('show');
Route::resource('user', UserController::class)->only('edit','update')->middleware('auth');
// Route::resource('ideas', IdeaController::class);

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('idea/{idea}/like', [IdeaLikeController::class  , 'like'])->middleware('auth')->name('ideas.like');

Route::post('idea/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);

Route::get('/terms', function(){
    return view ('terms');
});
// Route::get('/login', function () {
//     return view('dashboard');
// });

// Route::get('/feed', function (){
//     return view ('feed');
// });

// Route::get('/profile', function() {
//     return view ('profile')
// });