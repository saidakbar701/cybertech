<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\AdsController;
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
Route::get('/', [MainController::class, 'index'])->name('index.page');

Route::get('/contact', [MainController::class, 'contact'])->name('contact.page');

Route::post('/contact/sendMail', [AllController::class, 'sendMail'])->name('sendMail');

Route::get('/home/search', [AllController::class, 'search'])->name('search.page');

Route::get('/category/{slug}', [MainController::class, 'categoryPosts'])->name('categoryPosts.page');

Route::get('/postDetail/{slug}', [MainController::class, 'postDetail'])->name('postDetail.page');

Route::get('/admin/dashboard/page', [MainController::class, 'dashboard'])->name('dashboard.page');

Route::get('/lang/{lang}', function($lang) {
    session(['lang'=>$lang]);
    return back();
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('tags', TagsController::class);
    Route::resource('ads', AdsController::class);
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
