<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Blog\BlogController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('category',CategoryController::class);

    Route::resource('post',PostController::class);
    Route::get('/trashed', [PostController::class,'trash_show'])->name('post.trash');
    Route::put('/trashed/restore/{id}',[PostController::class,'restore'])->name('post.restore');

    Route::resource('tag',TagController::class);
});

Route::get('blog', [App\Http\Controllers\Blog\BlogController::class, 'index'])->name('blog.index');

Route::get('blog/{title}', [App\Http\Controllers\Blog\SinglePostController::class, 'single_post_show'])->name('blog.post');
Route::get('blog/tags/{tag}', [App\Http\Controllers\Blog\BlogController::class, 'tag_based'])->name('blog.tag');
Route::get('blog/categories/{category}', [App\Http\Controllers\Blog\BlogController::class, 'category_based'])->name('blog.category');
