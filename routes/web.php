<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagControllere;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::view('url akses', 'lokasi file blade');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('contact', 'contact');
Route::view('about', 'about');

Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->withoutMiddleware('auth')->name('posts.index');
    Route::get('create', [PostController::class, 'create'])->name('posts.create');
    Route::post('store', [PostController::class, 'store'])->name('posts.store');
    Route::get('{post:slug}', [PostController::class, 'show'])->withoutMiddleware('auth')->name('posts.show');
    Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('{post:slug}/edit', [PostController::class, 'update'])->name('posts.update');
    Route::delete('{post:slug}/delete', [PostController::class, 'delete'])->name('posts.delete');
});

Route::prefix('categories')->group(function () {
    Route::get('{category:slug}', [CategoryController::class, 'index'])->name('categories.index');
});

Route::prefix('tags')->group(function () {
    Route::get('{tag:slug}', [TagControllere::class, 'index'])->name('tags.index');
});

Auth::routes();

