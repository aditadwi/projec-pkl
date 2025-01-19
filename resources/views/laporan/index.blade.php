@extends('layouts.layout') 

@section('title', 'Laporan') 

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Laporan</h1>
    <!-- pelaporTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan</h6><br>
           
        </div>
<style>
.filter-container {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
    align-items: flex-end; /* Pastikan semua elemen sejajar di bawah */
}

.filter-container .form-control {
    min-width: 450px;
}

.filter-container .form-group {
    margin: 0; /* Hilangkan margin tambahan */
}

</style>
        
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Tombol Export PDF -->
                <div>
                    <a class="btn btn-primary" href="{{ route('almarhum.semua') }}" target="_blank">
                        <i class="fas fa-file-pdf"></i> Export PDF
                    </a>
                </div>
        
                
            </div>
    
            <div class="card-body">
                <!-- Filter Tanggal -->
                <form method="GET" action="{{ route('laporan.index') }}">
                <div class="filter-container">
                    <div>
                        <label for="startDate" class="form-label">Dari Tanggal:</label>
                        <input type="date" id="startDate" name="startDate" class="form-control" value="{{ request('startDate') }}">
                    </div>
                    <div>
                        <label for="endDate" class="form-label">Sampai Tanggal:</label>
                        <input type="date" id="endDate" name="endDate" class="form-control" value="{{ request('endDate') }}">
                    </div>
                    <div class="form-group d-flex align-self-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </div>
                </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="pelaporTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Almarhum</th>
                        <th>Nama Almarhum</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Tempat, Tanggal Meninggal</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal Pelaporan</th>
                        <th>Nama Keluarga</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($almarhum as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nik }}</td>
                            <td>{{ $dt->namaalmarhum }}</td>
                            <td>{{ $dt->tempat_tanggal_lahir }}</td>
                            <td>{{ $dt->tempat_tanggal_meninggal }}</td>
                            <td>{{ $dt->pelapor->namapelapor }}</td>
                            <td>{{ $dt->pelapor->tanggal_pelaporan }}</td>
                            <td>{{ $dt->nama_keluarga }}</td>
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
<script>
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

     // Custom search function for date range
     $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const startDate = $('#startDate').val();
                const endDate = $('#endDate').val();
                const rowDate = data[3]; // Tanggal ada di kolom ke-4 (indeks 3)

                if (startDate && endDate) {
                    const formattedRowDate = new Date(rowDate);
                    const start = new Date(startDate);
                    const end = new Date(endDate);

                    return formattedRowDate >= start && formattedRowDate <= end;
                }
                return true; // Tampilkan semua data jika filter tidak diisi
            }
        );

        // Apply filter on date change
        $('#startDate, #endDate').on('change', function() {
            table.draw();
        });
    
</script>

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- pelaporTables -->
<script src="{{ asset('vendor/pelaportables/jquery.pelaporTables.min.js') }}"></script>
<script src="{{ asset('vendor/pelaportables/pelaporTables.bootstrap4.min.js') }}"></script>
@endsection
