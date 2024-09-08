<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogsController;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\BlogsController::class, 'index'])->name('welcome');
Route::get('/blog/{post}', [BlogsController::class, 'show'])->name('blog.show');
// Route::get('/blog/{post}/show', [BlogsController::class, 'sideshow']);

// Route::get('/', function () {
//   return view('welcome');
// })->name('welcome');
// Route::get('/listing', function () {
//   return view('posts');
// });


Route::get('/posts/{user_id}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.delete');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/test', function () {
  dd(Auth::user());
});
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
Route::get('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.delete');

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/test', function () {
    dd(Auth::user());
  });
});



// Route::get('/home', function () {
// return view('home');
// });
