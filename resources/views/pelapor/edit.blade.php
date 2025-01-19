@extends('layouts.layout')
@section('title', 'Edit Data Pelapor')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Data Pelapor</h1>
    <p class="mb-4">Perbarui informasi pelapor di bawah ini.</p>

    <!-- Form Edit -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pelapor</h6>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('pelapor.update', $pelapor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Pelapor -->
                <div class="form-group">
                    <label for="namapelapor">Nama Pelapor</label>
                    <input type="text" name="namapelapor" id="namapelapor" class="form-control" 
                           value="{{ old('namapelapor', $pelapor->namapelapor) }}" required>
                </div>

                <!-- Tanggal Pelaporan -->
                <div class="form-group">
                    <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                    <input type="date" name="tanggal_pelaporan" id="tanggal_pelaporan" class="form-control" 
                           value="{{ old('tanggal_pelaporan', $pelapor->tanggal_pelaporan) }}" required>
                </div>

                <!-- No HP -->
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" name="nohp" id="nohp" class="form-control" 
                           value="{{ old('nohp', $pelapor->nohp) }}" required>
                </div>

                <!-- NIK Pelapor -->
                <div class="form-group">
                    <label for="nik">NIK Pelapor</label>
                    <input type="text" name="nik" id="nik" class="form-control" 
                           value="{{ old('nik', $pelapor->nik) }}" required>
                </div>

                <!-- Alamat Pelapor -->
                <div class="form-group">
                    <label for="alamat">Alamat Pelapor</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $pelapor->alamat) }}</textarea>
                </div>

                <!-- Nama Saksi I -->
                <div class="form-group">
                    <label for="namasaksi1">Nama Saksi I</label>
                    <input type="text" name="namasaksi1" id="namasaksi1" class="form-control" 
                           value="{{ old('namasaksi1', $pelapor->namasaksi1) }}" required>
                </div>

                <!-- NIK Saksi I -->
                <div class="form-group">
                    <label for="niksaksi1">NIK Saksi I</label>
                    <input type="text" name="niksaksi1" id="niksaksi1" class="form-control" 
                           value="{{ old('niksaksi1', $pelapor->niksaksi1) }}" required>
                </div>

                <!-- Nama Saksi II -->
                <div class="form-group">
                    <label for="namasaksi2">Nama Saksi II</label>
                    <input type="text" name="namasaksi2" id="namasaksi2" class="form-control" 
                           value="{{ old('namasaksi2', $pelapor->namasaksi2) }}" required>
                </div>

                <!-- NIK Saksi II -->
                <div class="form-group">
                    <label for="niksaksi2">NIK Saksi II</label>
                    <input type="text" name="niksaksi2" id="niksaksi2" class="form-control" 
                           value="{{ old('niksaksi2', $pelapor->niksaksi2) }}" required>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('pelapor.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
