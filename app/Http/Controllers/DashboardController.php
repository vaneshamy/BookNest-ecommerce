<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama customer.
     */
    public function __invoke(): View
    {
        return view('dashboard');
    }
}