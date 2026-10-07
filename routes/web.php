<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Halaman utama
Route::get('/', [PortfolioController::class, 'index'])->name('home');
