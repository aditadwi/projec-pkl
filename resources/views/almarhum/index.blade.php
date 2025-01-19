@extends('layouts.layout') 
@section('title', 'Data Almarhum') 
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Data almarhum</h1>
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Almarhum</h6><br>
            <form action="{{ route('almarhum.index') }}" method="GET" class="input-group mb-3">
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
    
          <!-- DataTales Example -->
            <div class="card-body">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Almarhum</th>
                            <th>Tempat Tgl Lahir</th>
                            <th>Tempat Tgl Meninggal</th>
                            <th>Nama Tempat Pemakaman</th>
                            <th>NIK Almarhum</th>
                            <th>Nama Keluarga</th>
                            <th>No Hp Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->namaalmarhum }}</td>
                            <td>{{ $dt->tempat_tanggal_lahir }}</td>
                            <td>{{ $dt->tempat_tanggal_meninggal }}</td>
                            <td>{{ $dt->nama_tempat_pemakaman }}</td>
                            <td>{{ $dt->nik }}</td>
                            <td>{{ $dt->nama_keluarga }}</td>
                            <td>{{ $dt->nohp_keluarga }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Aksi">
                                    <!-- Form Delete -->
                                    <form action="{{ route('almarhum.destroy', $dt->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            
                                    <!-- View Button -->
                                    <a href="{{ route('almarhum.show', $dt->id) }}" class="btn btn-success btn-sm" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            
                                <!-- PDF Button -->
                                <div class="btn-group mt-2" role="group">
                                    <a href="{{ route('almarhum.pdf', $dt->id) }}" class="btn btn-primary btn-sm d-flex align-items-center" title="Cetak PDF">
                                        <i class="fas fa-file-pdf  "></i> Cetak PDF
                                    </a>
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


</script>

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
</script>
@endsection
