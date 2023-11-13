<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post_controller;
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

Route::get('/', function () {
    return view('auth/login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/view', [Post_controller::class, 'viewPost'])->name('post/view.viewPost');
    Route::get('/post/add', [Post_controller::class, 'addPost'])->name('post/add.addPost');
    Route::post('/post/save', [Post_controller::class, 'savePost'])->name('post/save.savePost');
    Route::post('/post/update/{id}', [Post_controller::class, 'updatePost'])->name('post/update.updatePost');
    Route::post('/post/delete/{id}', [Post_controller::class, 'deletePost'])->name('post/delete.deletePost');
});

require __DIR__.'/auth.php';
