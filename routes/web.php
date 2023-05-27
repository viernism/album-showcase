<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
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

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/', [GalleryController::class, 'index'])->name('home');
Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::match(['get', 'post'], '/edit/{galleryId}', [GalleryController::class, 'update'])->name('update');
Route::delete('/delete/{galleryId}', [GalleryController::class, 'delete'])->name('gallery.delete');


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
