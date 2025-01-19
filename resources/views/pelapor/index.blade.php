@extends('layouts.layout') 
@section('title', 'Pelapor') 
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Data Pelapor</h1>
    <p class="mb-4">Daftar informasi pelapor terdaftar.</p>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelapor</h6><br>
            <form action="{{ route('pelapor.index') }}" method="GET" class="input-group mb-3">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari NIK" value="{{ request('search') }}">
                <button class="btn btn-primary btn-sm" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelapor</th>
                            <th>Tanggal Pelaporan</th>
                            <th>No HP</th>
                            <th>Nik Pelapor</th>
                            <th>Alamat Pelapor</th>
                            <th>Nama Saksi I</th>
                            <th>NIK Saksi I</th>
                            <th>Nama Saksi II</th>
                            <th>NIK Saksi II</th>
                            <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->namapelapor }}</td>
                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->translatedFormat('l, d F Y') }}</td>
                            <td>{{ $dt->nohp }}</td>
                            <td>{{ $dt->nik }}</td>
                            <td>{{ $dt->alamat }}</td>
                            <td>{{ $dt->namasaksi1 }}</td>
                            <td>{{ $dt->niksaksi1 }}</td>
                            <td>{{ $dt->namasaksi2 }}</td>
                            <td>{{ $dt->niksaksi2 }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- Form Delete -->
                                    <form action="{{ route('pelapor.destroy', $dt->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a type="button" class="btn btn-warning" href="{{ route('pelapor.edit', $dt->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <a type="button" class="btn btn-success" href="{{ route('pelapor.show', $dt->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
{{--                                     
                                    <a href="{{ route('anak.pdf', $dt->id) }}" class="btn btn-primary">
                                        <i class="fas fa-file-pdf"></i> Cetak PDF
                                    </a> --}}
                                                                        
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
<!-- DataTables -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- DataTables Initialization -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
            $(document).ready(function() {
                // Inisialisasi DataTables
                $('#example1').DataTable({
                    "pagingType": simple,
                    "responsive": true,
                    "autoWidth": false,
                    "lengthChange": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "searching": true,
                    "language": {
                        "search": "Cari:",
                        "lengthMenu": "Tampilkan MENU data per halaman",
                        "zeroRecords": "Tidak ada data yang ditemukan",
                        "info": "Menampilkan START hingga END dari TOTAL data",
                        "infoEmpty": "Tidak ada data tersedia",
                        "infoFiltered": "(disaring dari MAX total data)",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "Berikutnya",
                            "previous": "Sebelumnya"
                        }
                    },
                
                    // Memindahkan elemen search ke kanan atas
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 text-right"f>>' +
                   '<"row"<"col-sm-12"tr>>' +
                   '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        });
    });

</script>
@endsection
