@extends('layouts.layout')

@section('title', 'Detail pelapor') <!-- Judul halaman -->

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Data Pelapor</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pelapor</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama Pelapor:</div>
                <div class="col-sm-9">{{ $pelapor->namapelapor }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nik Pelapor:</div>
                <div class="col-sm-9">{{ $pelapor->nik }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">No Hp Pelapor:</div>
                <div class="col-sm-9">{{ $pelapor->nohp }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tanggal pelaporan:</div>
                <div class="col-sm-9">{{ $pelapor->tanggal_pelaporan }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Alamat:</div>
                <div class="col-sm-9">{{ $pelapor->alamat }}</div>
            </div>

            <div class="text-right">
                <a href="{{ url('/pelapor') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
