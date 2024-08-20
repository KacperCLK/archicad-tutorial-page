<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;

Route::prefix('archicad-tutorial')->group(function () {

    // Strona główna i przekierowanie
    Route::get('/', function () {
        return redirect()->route('home');
    });

    // Strony informacyjne
    Route::prefix('pages')->group(function () {
        Route::get('/home', [PageController::class, 'home'])->name('home');
        Route::get('/about', [PageController::class, 'about'])->name('about');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
        Route::get('/coord-changer', [PageController::class, 'coordChanger'])->name('coord-changer');
        
        // Tutoriale
        Route::prefix('tutorials')->name('tutorials.')->group(function () {
            Route::get('/', [TutorialController::class, 'index'])->name('index');
            Route::get('{tutorial}', [TutorialController::class, 'show'])->name('show');
        });
    });

    Auth::routes();

    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
});
