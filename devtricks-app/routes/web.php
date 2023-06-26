<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post_categoryController;
use App\Http\Controllers\Post_tagsController;
use App\Http\Controllers\Post_newsController;
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

Route::prefix('dashboard')->group(function () {
  Route::prefix('/')->group(function () {

  });

  Route::prefix('/post-category')->group(function () {
    Route::get('/', [Post_categoryController::class, 'index']);
    Route::get('/create', [Post_categoryController::class, 'create']);
    Route::post('/store', [Post_categoryController::class, 'store'])->name('cat_add');
    Route::get('/edit/{id}', [Post_categoryController::class, 'edit']);
    Route::post('/update/{id}', [Post_categoryController::class, 'update']);
    Route::post('/delete', [Post_categoryController::class, 'destroy']);
    Route::post('/status', [Post_categoryController::class, 'upstatus']);
  });


  Route::prefix('post-news')->group(function () {
    Route::get('/', [Post_newsController::class, 'index']);
    Route::get('/create', [Post_newsController::class, 'create']);
    Route::post('/store', [Post_newsController::class, 'store'])->name('news_add');
    Route::get('/edit/{id}', [Post_newsController::class, 'edit']);
    Route::post('/update/{id}', [Post_newsController::class, 'update']);
    Route::post('/delete', [Post_newsController::class, 'destroy']);
    Route::post('/status', [Post_newsController::class, 'upstatus']);
    Route::post('/featured', [Post_newsController::class, 'upfeatured']);

  });

  Route::prefix('post-tags')->group(function () {
    Route::get('/', [Post_tagsController::class, 'index']);
    Route::get('/create', [Post_tagsController::class, 'create']);
    Route::post('/store', [Post_tagsController::class, 'store'])->name('tag_add');
    Route::get('/edit/{id}', [Post_tagsController::class, 'edit']);
    Route::post('/update/{id}', [Post_tagsController::class, 'update']);
    Route::post('/delete', [Post_tagsController::class, 'destroy']);
    Route::post('/status', [Post_tagsController::class, 'upstatus']);
  });


});

require __DIR__.'/auth.php';
