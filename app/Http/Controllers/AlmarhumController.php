<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF facade
use App\Models\Almarhum;

class AlmarhumController extends Controller
{

    public function index(Request $request)
    {
        // Set locale Carbon ke Bahasa Indonesia
        \Carbon\Carbon::setLocale('id');
    
        // Ambil input pencarian dari query string
        $search = $request->input('search');
    
        // Query data pelapor dengan pencarian
        $data = Almarhum::when($search, function ($query, $search) {
            return $query->where('nik', 'like', '%' . $search . '%');
        })->paginate(50); // Pagination dengan 50 data per halaman
    
        // Kirim data ke view
        return view('almarhum.index', [
            'title' => 'Data Almarhum',
            'data' => $data, // Kirim data hasil pencarian
        ]);
    }

    

    // Proses tambah data almarhum
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelapor_id' => 'nullable|exists:pelapors,id',
            'user_id' => 'nullable|exists:users,id',
            'namaalmarhum' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'tempat_tanggal_meninggal' => 'required|string|max:255',
            'nama_tempat_pemakaman' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:almarhums,nik',
            'nama_keluarga' => 'required|string|max:255',
            'nohp_keluarga' => 'required|string|max:20',
        ], [
            'nik.unique' => 'NIK telah terdaftar, silakan gunakan NIK lain.',
            'nik.size' => 'NIK harus terdiri dari 16 digit.',
        ]);

        Almarhum::create($validated);

        return redirect()->route('almarhum.index')->with('success', 'Data almarhum berhasil disimpan!');
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('almarhum.create', ["title" => "Tambah Data Almarhum"]);
    }

    // Cetak PDF satu data
    public function printPDF($id)
    {
        $data = Almarhum::findOrFail($id);
        $pdf = Pdf::loadView('almarhum.pdf', compact('data'));
        return $pdf->download('data-almarhum-' . $data->namaalmarhum . '.pdf');
    }

    // Cetak PDF semua data
    public function cetakSemua()
    {
        $almarhum = Almarhum::orderBy('created_at', 'DESC')->get();
        $pdf = Pdf::loadView('almarhum.semua', ['almarhum' => $almarhum])
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan_semua_almarhum.pdf');
    }

    // Tampilkan detail data almarhum
    public function show($id)
    {
        $almarhum = Almarhum::findOrFail($id);
        return view('almarhum.show', compact('almarhum'));
    }

    // Hapus data almarhum
    public function destroy($id)
    {
        $almarhum = Almarhum::findOrFail($id);

        try {
            $almarhum->delete();
            return redirect()->route('almarhum.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('almarhum.index')->with('error', 'Gagal menghapus data.');
        }
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $almarhum = Almarhum::findOrFail($id);
        return view('almarhum.edit', compact('almarhum'));
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'namaalmarhum' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'tempat_tanggal_meninggal' => 'required|string|max:255',
            'nama_tempat_pemakaman' => 'required|string|max:255',
            'nik' => "required|string|size:16|unique:almarhums,nik,$id",
            'nama_keluarga' => 'required|string|max:255',
            'nohp_keluarga' => 'required|string|max:20',
        ], [
            'nik.unique' => 'NIK telah terdaftar, silakan gunakan NIK lain.',
        ]);

        $almarhum = Almarhum::findOrFail($id);
        $almarhum->update($validated);

        return redirect()->route('almarhum.index')->with('success', 'Data almarhum berhasil diperbarui.');
    }
}
