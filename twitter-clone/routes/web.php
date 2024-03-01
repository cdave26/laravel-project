<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
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

    Route::post('', [IdeaController::class, 'store'])->name('store')->withoutMiddleware(['auth']);

    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);

    Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

    Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

    Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


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