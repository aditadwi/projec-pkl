<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Almarhum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            "title" => "Data User",
            "data" => User::all()
        ]);
    }

    public function create()
    {
        return view('user.create')->with([
            "title" => "Tambah Data User"
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:users,nik',  
        ]);

        // Membuat pengguna baru
        $user = new User();
        $user->name = $validatedData['name'];
        $user->nik = $validatedData['nik'];  
        $user->save(); 

        return redirect()->route('user.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function laporan(Request $request)
    {
         // Set locale Carbon ke Bahasa Indonesia
         \Carbon\Carbon::setLocale('id');
    
         // Ambil input pencarian dari query string
         $search = $request->input('search');
     
         // Query data pelapor dengan pencarian
         $data = Almarhum::when($search, function ($query, $search) {
             return $query->where('nik', 'like', '%' . $search . '%');
         })->paginate(50); // Pagination dengan 50 data per halaman
        
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        $query = Almarhum::with('pelapor')->orderBy('created_at', 'DESC');
    
        if ($startDate && $endDate) {
            $query->whereHas('pelapor', function ($q) use ($startDate, $endDate) {
                $q->whereBetween('tanggal_pelaporan', [$startDate, $endDate]);
            });
        }

        $almarhum = $query->get();
    
        return view('laporan.index', [
            'almarhum' => $almarhum, 
        ]);
    }
    }

