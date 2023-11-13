<?php

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
    return view('welcome');
});

Route::get('/post/view', [Post_controller::class, 'viewPost']);
Route::get('/post/add', [Post_controller::class, 'addPost']);
Route::post('/post/save', [Post_controller::class, 'savePost']);
Route::post('/post/update/{id}', [Post_controller::class, 'updatePost']);
Route::post('/post/delete/{id}', [Post_controller::class, 'deletePost']);
