<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan (Landing Page) Toko Buku BookNest.
     */
    public function __invoke(): View
    {
        return view('welcome');
    }
}