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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware' =>'auth:admin'], function (){
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

    });
});

Route::group(['middleware' =>'auth:superadmin'], function (){
    Route::prefix('superadmin')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\Superadmin\DashboardController::class, 'index'])->name('superadmin.dashboard.index');
        // Route::get('/content/posts/CheckSlug', [App\Http\Controllers\Superadmin\PostController::class, 'CheckSlug'])->name('superadmin.post.create');
        Route::get('/posts', [App\Http\Controllers\Superadmin\PostController::class, 'index'])->name('superadmin.posts.index');
        Route::get('/posts/create', [App\Http\Controllers\Superadmin\PostController::class, 'create'])->name('superadmin.post.create');
        Route::post('/posts/store', [App\Http\Controllers\Superadmin\PostController::class, 'store'])->name('superadmin.post.store');
});
});
