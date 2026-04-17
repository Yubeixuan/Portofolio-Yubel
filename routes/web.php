<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Halaman utama
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Kirim pesan contact form
Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('contact.send');