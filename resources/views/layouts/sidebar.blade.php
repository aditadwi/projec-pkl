<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-daed"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pemakaman Online</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownPelapor" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelapor</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownPelapor">
            <a class="dropdown-item" href="{{ route('pelapor.create') }}">Tambah Laporan</a>
            <a class="dropdown-item" href="{{ route('pelapor.index') }}">Data Pelapor</a>

        </div>
    </li>
    

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('almarhum.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Almarhum</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Laporan</span>
        </a>
    </li>
</ul>
