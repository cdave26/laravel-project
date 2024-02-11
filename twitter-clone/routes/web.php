<?php

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');


Route::get('/profile', [ProfileController::class, 'profile']);
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