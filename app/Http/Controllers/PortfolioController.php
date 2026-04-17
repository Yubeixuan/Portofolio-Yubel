<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    /**
     * Tampilkan halaman utama portfolio
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Proses pengiriman contact form
     */
    public function sendContact(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:2000',
        ]);

        // Kirim email (pastikan sudah konfigurasi MAIL di .env)
        // Mail::to('emailkamu@gmail.com')->send(new \App\Mail\ContactMail($validated));

        return redirect()->route('home')
            ->with('success', 'Pesan berhasil dikirim! Saya akan segera membalas.');
    }
}