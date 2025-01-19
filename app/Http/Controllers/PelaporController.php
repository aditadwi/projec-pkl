<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelapor;
use App\Models\Almarhum;


class PelaporController extends Controller
{


    public function index(Request $request)
    {
        // Set locale Carbon ke Bahasa Indonesia
        \Carbon\Carbon::setLocale('id');
    
        // Ambil input pencarian dari query string
        $search = $request->input('search');
    
        // Query data pelapor dengan pencarian
        $data = Pelapor::when($search, function ($query, $search) {
            return $query->where('nik', 'like', '%' . $search . '%');
        })->paginate(50); // Pagination dengan 50 data per halaman
    
        // Kirim data ke view
        return view('pelapor.index', [
            'title' => 'Data Pelapor',
            'data' => $data, // Kirim data hasil pencarian
        ]);
    }
    
    public function edit($id)
{
    // Ambil data pelapor berdasarkan ID
    $pelapor = Pelapor::findOrFail($id);

    // Tampilkan view form edit dengan data pelapor
    return view('pelapor.edit', compact('pelapor'));
}


    public function create()
    {
        return view('pelapor.create', [
            'title' => 'Tambah Data Pelapor',
        ]);
    }

    // Menyimpan data pelapor ke database
    public function store(Request $request)
    {
        \Carbon\Carbon::setLocale('id');
    
        // Validasi input form
        $validated = $request->validate([
            // Validasi untuk tabel pelapor
            'namapelapor' => 'required|string|max:255',
            'tanggal_pelaporan' => 'nullable|date',
            'nohp' => 'required|string|max:20',
            'nik' => 'required|string|max:20|unique:pelapors,nik',
            'alamat' => 'required|string',
            'namasaksi1' => 'required|string|max:255',
            'namasaksi2' => 'required|string|max:255',
            'niksaksi1' => 'required|string|max:20|unique:pelapors,niksaksi1',
            'niksaksi2' => 'required|string|max:20|unique:pelapors,niksaksi2',
            // Validasi untuk tabel almarhum
            'namaalmarhum' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'tempat_tanggal_meninggal' => 'required|string|max:255',
            'nama_tempat_pemakaman' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'nama_keluarga' => 'required|string|max:255',
            'nohp_keluarga' => 'required|string|max:20',
        ]);
            
        // Simpan data ke tabel 'pelapors'
        $pelapor = Pelapor::create([
            'namapelapor' => $validated['namapelapor'],
            'tanggal_pelaporan' => $validated['tanggal_pelaporan'] ?? now(), // Default ke tanggal saat ini jika kosong
            'nohp' => $validated['nohp'],
            'nik' => $validated['nik'],
            'alamat' => $validated['alamat'],
            'namasaksi1' => $validated['namasaksi1'],
            'namasaksi2' => $validated['namasaksi2'],
            'niksaksi1' => $validated['niksaksi1'],
            'niksaksi2' => $validated['niksaksi2'],
        ]);
    
        // Simpan data ke tabel 'almarhum'
        Almarhum::create([
            'pelapor_id' => $pelapor->id, // Relasi ke pelapor
            'namaalmarhum' => $validated['namaalmarhum'],
            'tempat_tanggal_lahir' => $validated['tempat_tanggal_lahir'],
            'tempat_tanggal_meninggal' => $validated['tempat_tanggal_meninggal'],
            'nama_tempat_pemakaman' => $validated['nama_tempat_pemakaman'],
            'nik' => $validated['nik'],
            'nama_keluarga' => $validated['nama_keluarga'],
            'nohp_keluarga' => $validated['nohp_keluarga'],
        ]);
    
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Data pelapor dan almarhum berhasil disimpan!');
    }

    // Menampilkan detail pelapor berdasarkan ID
    public function show($id)
    {
        // Ambil data pelapor berdasarkan ID
        $pelapor = Pelapor::findOrFail($id);

        // Return view dengan data pelapor
        return view('pelapor.show', [
            'title' => 'Detail Pelapor',
            'pelapor' => $pelapor,
        ]);
    }

    // Menghapus data pelapor berdasarkan ID
    public function destroy($id)
    {
        $pelapor = Pelapor::findOrFail($id); // Cari data berdasarkan ID

        try {
            $pelapor->delete(); // Hapus data
            return redirect()->route('pelapor.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('pelapor.index')->with('error', 'Gagal menghapus data.');
        }
 
    }
    public function update(Request $request, $id)
{
    // Validasi data input
    $validated = $request->validate([
        'namapelapor' => 'required|string|max:255',
        'tanggal_pelaporan' => 'nullable|date', // Boleh kosong, jika kosong gunakan default
        'nohp' => 'required|string|max:15',
        'nik' => 'required|string|max:20|unique:pelapors,nik,' . $id, // Pastikan NIK unik, kecuali untuk ID ini
        'alamat' => 'required|string|max:500',
        'namasaksi1' => 'required|string|max:255',
        'namasaksi2' => 'required|string|max:255',
        'niksaksi1' => 'required|string|max:20|unique:pelapors,niksaksi1,' . $id,
        'niksaksi2' => 'required|string|max:20|unique:pelapors,niksaksi2,' . $id,
    ]);

    // Ambil data pelapor berdasarkan ID
    $pelapor = Pelapor::findOrFail($id);

    // Update data pelapor
    $pelapor->update([
        'namapelapor' => $validated['namapelapor'],
        'tanggal_pelaporan' => $validated['tanggal_pelaporan'] ?? now(), // Default ke tanggal saat ini jika kosong
        'nohp' => $validated['nohp'],
        'nik' => $validated['nik'],
        'alamat' => $validated['alamat'],
        'namasaksi1' => $validated['namasaksi1'],
        'namasaksi2' => $validated['namasaksi2'],
        'niksaksi1' => $validated['niksaksi1'],
        'niksaksi2' => $validated['niksaksi2'],
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('pelapor.index')->with('success', 'Data pelapor berhasil diperbarui.');
}

}
