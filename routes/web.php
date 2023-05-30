<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;


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

Route::middleware(['guest'])->group(function () {
    Route::get('register',[RegisterController::class,'index']);
    Route::post('register',[RegisterController::class,'registerUser'])->name('register');

    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'loginUser'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('home');
    Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::match(['get', 'post'], '/edit/{galleryId}', [GalleryController::class, 'update'])->name('update');
    Route::delete('/delete/{galleryId}', [GalleryController::class, 'delete'])->name('gallery.delete');
    Route::post('/logout',[LogoutController::class])->name('logout');
});