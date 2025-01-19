<?php

namespace App\Http\Controllers;

use App\Models\Almarhum;
use App\Models\User;
use App\Models\Pelapor;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data dari model yang relevan
        $almarhumCount = Almarhum::count();
        $userCount = User::count();
        $pelaporCount = Pelapor::count();

        // Kirim data ke view menggunakan compact
        return view('dashboard', compact('almarhumCount', 'userCount', 'pelaporCount'));
    }
}
