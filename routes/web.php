<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', DashboardController::class)
        ->middleware('verified')
        ->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::post('/profile/address', 'storeAddress')->name('profile.address.store');
    });


});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::post('/categories', 'store')->name('categories.store');
        Route::patch('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/books', 'index')->name('books.index');
        Route::post('/books', 'store')->name('books.store');
        Route::patch('/books/{book}', 'update')->name('books.update');
        Route::delete('/books/{book}', 'destroy')->name('books.destroy');
    });

});

require __DIR__.'/auth.php';