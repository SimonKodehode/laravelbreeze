<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    //Changed to Homepage
    return Inertia::render('HomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');//Added name for route

Route::middleware(['auth'])->group(function () {
  Route::get('/posts', function () {
      return redirect()->route('posts.index');
  });

  Route::resource('posts', BlogPostController::class);
});

// Added CRUD routes for posts
Route::get('/posts', [BlogPostController::class, 'index'])->middleware('auth')->name('posts.index');
Route::get('/posts/create', [BlogPostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [BlogPostController::class, 'store'])->middleware('auth')->name('posts.store');
Route::get('/posts/{slug}', [BlogPostController::class, 'show'])->middleware('auth')->name('posts.show');
Route::get('/posts/{slug}/edit', [BlogPostController::class, 'edit'])->middleware('auth')->name('posts.edit');
Route::put('/posts/{slug}', [BlogPostController::class, 'update'])->middleware('auth')->name('posts.update');
Route::delete('/posts/{slug}', [BlogPostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

// added CRUD routes for comments                                                                   //Added name for storing comments
Route::post('/posts/{slug}/comments', [CommentController::class, 'store'])->middleware(['auth'])->name('comments.store');
Route::get('/comments/{commentId}/edit', [CommentController::class, 'edit'])->middleware(['auth']);
Route::put('/comments/{commentId}', [CommentController::class, 'update'])->middleware(['auth']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');

// added CRUD routes for likes
Route::post('/posts/{post}/like', [LikeController::class, 'store'])->middleware('auth')->name('posts.likes.store');
Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->middleware('auth')->name('posts.likes.destroy');

// added route for dashboard with posts
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
