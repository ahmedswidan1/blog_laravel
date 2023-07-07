<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//main
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('welcome');


Route::resource('posts', PostController::class)->middleware('auth');
Route::get('posts/{post}/show', [PostController::class, 'show'])->name('postpadg')->withoutMiddleware(['auth']);
//dashbord
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('admin/password', 'AdminController@showPasswordForm')->name('admin.password');
Route::post('admin/password', 'AdminController@updatePassword')->name('admin.password.update');

//comments
Route::post('/posts/{post}', [CommentController::class, 'store'])->name('comments.store');

use App\Http\Controllers\CommentController;

Route::resource('comments', CommentController::class)->only(['store', 'destroy']);
