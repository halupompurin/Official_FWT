<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cawangan', function () {
    return view('cawangan');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// NEWS ROUTES - FIXED (removed duplicate and conflicting routes)
Route::get('/news', [PostController::class, 'publicIndex'])->name('news.index');
Route::get('/news/{post}', [PostController::class, 'publicShow'])->name('news.show');

// LOGIN ROUTES - FIXED (removed duplicate)
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Auth check route for AJAX requests
Route::get('/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
})->name('check.auth');

// PROTECTED ROUTES (requires authentication)
Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('dashboard.analytics');
    Route::get('/dashboard/stats', [DashboardController::class, 'quickStats'])->name('dashboard.stats');
    Route::get('/dashboard/recent-posts', [DashboardController::class, 'getRecentPosts'])->name('dashboard.recent-posts');

    // Messages management
    Route::get('/admin/messages', [DashboardController::class, 'viewMessages'])->name('admin.messages');
    Route::delete('/admin/messages/{id}', [DashboardController::class, 'destroyMessage'])->name('admin.messages.destroy');

    // Posts management routes
    Route::resource('posts', PostController::class)->except(['show']);
    Route::post('/posts/{post}/toggle-status', [PostController::class, 'toggleStatus'])->name('posts.toggle-status');
    Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::post('/posts/bulk-delete', [PostController::class, 'bulkDelete'])->name('posts.bulk-delete');
    Route::get('/posts/export', [PostController::class, 'export'])->name('posts.export');
    Route::get('/posts/stats', [PostController::class, 'getStats'])->name('posts.stats');
});