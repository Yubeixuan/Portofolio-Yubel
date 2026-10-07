<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    /**
     * Tampilkan halaman utama portfolio
     */
    public function index()
    {
        return view('home');
    }
}