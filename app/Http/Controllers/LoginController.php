<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'name' => ['required'],
            'nik' => ['required', 'numeric'],
        ]);
    
        // Cek manual user berdasarkan name dan nik
        $user = User::where('name', $credentials['name'])
                    ->where('nik', $credentials['nik'])
                    ->first();
    
        if ($user) {
            // Login user secara manual tanpa password
            Auth::login($user);
    
            // Redirect jika berhasil login
            return redirect()->intended('dashboard');
        }
    
        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'login' => 'Nama atau NIK tidak cocok.',
        ]);
    }
    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function loginView()
    {
        return view('login'); // Example view file
    }
}
