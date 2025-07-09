<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])
    ->get('/dashboard', function () {
        return redirect()->route('admin.products.index');
    })
    ->name('dashboard');

// Admin Product CRUD
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('products', ProductController::class);
    });

// User Profile (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
         ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
           ->name('profile.destroy');
});

require __DIR__.'/auth.php';