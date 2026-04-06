<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
