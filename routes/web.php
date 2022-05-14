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

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home.index');

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

        Route::get('/posts/edit/{id}', [App\Http\Controllers\Superadmin\PostController::class, 'edit'])->name('superadmin.post.edit');
        Route::post('/posts/update{id}', [App\Http\Controllers\Superadmin\PostController::class, 'update'])->name('superadmin.post.update');

        Route::get('/posts/show/{id}', [App\Http\Controllers\Superadmin\PostController::class, 'show'])->name('superadmin.post.show');

        Route::get('/posts/delete/{id}', [App\Http\Controllers\Superadmin\PostController::class, 'delete'])->name('superadmin.post.delete');


        //category crud
        Route::get('/category', [App\Http\Controllers\Superadmin\CategoryController::class, 'index'])->name('superadmin.category.index');
        Route::get('/category/create', [App\Http\Controllers\Superadmin\CategoryController::class, 'create'])->name('superadmin.category.create');
        Route::post('/category/store', [App\Http\Controllers\Superadmin\CategoryController::class, 'store'])->name('superadmin.category.store');

        Route::get('/category/edit/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'edit'])->name('superadmin.category.edit');
        Route::post('/category/update/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'update'])->name('superadmin.category.update');

        Route::get('/category/delete/{id}', [App\Http\Controllers\Superadmin\CategoryController::class, 'delete'])->name('superadmin.category.delete');


      
   
      //anggota CRUD
      Route::get('/gambar', [App\Http\Controllers\Superadmin\GambarController::class, 'index'])->name('superadmin.gambar.index');

      Route::get('/gambar/create', [App\Http\Controllers\Superadmin\GambarController::class, 'create'])->name('superadmin.gambar.create');
      Route::post('/gambar/store', [App\Http\Controllers\Superadmin\GambarController::class, 'store'])->name('superadmin.gambar.store');

      Route::get('/gambar/edit/{id}', [App\Http\Controllers\Superadmin\GambarController::class, 'edit'])->name('superadmin.gambar.edit');
      Route::post('/gambar/update/{id}', [App\Http\Controllers\Superadmin\GambarController::class, 'update'])->name('superadmin.gambar.update');
    
      Route::get('/gambar/delete/{id}', [App\Http\Controllers\Superadmin\GambarController::class, 'delete'])->name('superadmin.gambar.delete');

      //CRUD anggota
      Route::get('/anggota', [App\Http\Controllers\Superadmin\AnggotaController::class, 'index'])->name('superadmin.anggota.index');

      Route::get('/anggota/create', [App\Http\Controllers\Superadmin\AnggotaController::class, 'create'])->name('superadmin.anggota.create');
      Route::post('/anggota/store', [App\Http\Controllers\Superadmin\AnggotaController::class, 'store'])->name('superadmin.anggota.store');

      Route::get('/anggota/edit/{id}', [App\Http\Controllers\Superadmin\AnggotaController::class, 'edit'])->name('superadmin.anggota.edit');
      Route::post('/anggota/update/{id}', [App\Http\Controllers\Superadmin\AnggotaController::class, 'update'])->name('superadmin.anggota.update');
    
      Route::get('/anggota/delete/{id}', [App\Http\Controllers\Superadmin\AnggotaController::class, 'delete'])->name('superadmin.anggota.delete');

    //download pdf
    Route::get('/exportpdf', [App\Http\Controllers\Superadmin\AnggotaController::class, 'exportpdf'])->name('superadmin.anggota.exportpdf');
});
});



