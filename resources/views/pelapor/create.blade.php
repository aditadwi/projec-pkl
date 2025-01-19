@extends('layouts.layout') <!-- Menggunakan layout.blade.php -->

@section('title', 'Tambah Pelapor') <!-- Menentukan judul halaman -->

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Pelapor</h1>
<p class="mb-4">Silakan isi data pelapor baru dengan lengkap.</p>

<!-- Form Tambah Pelapor -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pelapor</h6>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('pelapor.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="namapelapor">Nama Pelapor</label>
                <input type="text" class="form-control" id="namapelapor" name="namapelapor" placeholder="Masukkan nama pelapor" required>
            </div>
            <div class="form-group">
                <label for="nohp">Nomor Handphone Pelapor</label>
                <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan nomor handphone" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK Pelapor</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK pelapor" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Pelapor</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat pelapor" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" required>
            </div>
            <div class="form-group">
                <label for="namasaksi1">Nama Saksi I</label>
                <input type="text" class="form-control" id="namasaksi1" name="namasaksi1" placeholder="Masukkan nama saksi I" required>
            </div>
            <div class="form-group">
                <label for="niksaksi1">NIK Saksi I</label>
                <input type="text" class="form-control" id="niksaksi1" name="niksaksi1" placeholder="Masukkan NIK saksi I" required>
            </div>
            <div class="form-group">
                <label for="namasaksi2">Nama Saksi II</label>
                <input type="text" class="form-control" id="namasaksi2" name="namasaksi2" placeholder="Masukkan nama saksi II" required>
            </div>
            <div class="form-group">
                <label for="niksaksi2">NIK Saksi II</label>
                <input type="text" class="form-control" id="niksaksi2" name="niksaksi2" placeholder="Masukkan NIK saksi II" required>
            </div>
            <div class="form-group">
                <label for="namaalmarhum">Nama Almarhum/Almarhumah</label>
                <input type="text" class="form-control" id="namaalmarhum" name="namaalmarhum" placeholder="Masukkan nama almarhum/almarhumah" required>
            </div>
            <div class="form-group">
                <label for="tempat_tanggal_lahir">Tempat Tanggal Lahir</label>
                <input type="text" class="form-control" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" placeholder="Masukkan tempat dan tanggal lahir" required>
            </div>
            <div class="form-group">
                <label for="tempat_tanggal_meninggal">Tempat Tanggal Meninggal</label>
                <input type="text" class="form-control" id="tempat_tanggal_meninggal" name="tempat_tanggal_meninggal" placeholder="Masukkan tempat dan tanggal meninggal" required>
            </div>
            <div class="form-group">
                <label for="nama_tempat_pemakaman">Nama Tempat Pemakaman</label>
                <input type="text" class="form-control" id="nama_tempat_pemakaman" name="nama_tempat_pemakaman" placeholder="Masukkan nama tempat pemakaman" required>
            </div>
            <div class="form-group">
                <label for="nama_keluarga">Nama Keluarga</label>
                <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Masukkan nama keluarga" required>
            </div>
            <div class="form-group">
                <label for="nohp_keluarga">Nomor Handphone Keluarga</label>
                <input type="text" class="form-control" id="nohp_keluarga" name="nohp_keluarga" placeholder="Masukkan nomor handphone keluarga" required>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan Pelapor</button>
                <a href="{{ route('pelapor.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('tambahanJS')
<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- SB Admin 2 -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
@endsection
