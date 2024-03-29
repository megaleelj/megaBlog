<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NewsController;
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
//     return view('welcome');
// });

Route::get('/dashboard', [MyBlogController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for myBlog resource
Route::resource('myBlogs', MyBlogController::class);
Route::get('blog', [MyBlogController::class, 'index'])->name('blog');
Route::post('/check-email', [RegisteredUserController::class, 'checkEmail'])->name('checkEmail');
Route::post('/location', [NewsController::class, 'index'])->name('welcome.show');
Route::get('/', [NewsController::class, 'index']);

require __DIR__.'/auth.php';
