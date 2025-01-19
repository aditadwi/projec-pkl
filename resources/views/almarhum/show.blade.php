@extends('layouts.layout')

@section('title', 'Detail Almarhum') <!-- Judul halaman -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Almarhum</h1>
    <p class="mb-4">Informasi lengkap dari data almarhum terpilih.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Almarhum</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama almarhum:</div>
                <div class="col-sm-9">{{ $almarhum->namaalmarhum }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tempat, Tanggal Lahir:</div>
                <div class="col-sm-9">{{ $almarhum->tempat_tanggal_lahir }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tempat, Tanggal Meninggal:</div>
                <div class="col-sm-9">{{ $almarhum->tempat_tanggal_meninggal }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama Tempat Pemakaman:</div>
                <div class="col-sm-9">{{ $almarhum->nama_tempat_pemakaman }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">NIK Almarhum:</div>
                <div class="col-sm-9">{{ $almarhum->nik }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama Keluarga:</div>
                <div class="col-sm-9">{{ $almarhum->nama_keluarga }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">No Hp Keluarga:</div>
                <div class="col-sm-9">{{ $almarhum->nohp_keluarga }}</div>
            </div>
            <div class="text-right">
                <a href="{{ url('/almarhum') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
