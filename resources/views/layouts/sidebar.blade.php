<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMP NEGERI 2 PRAJEKAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Profile Collapse Menu -->
    {{-- @if (auth()->user()->role == 'admin') --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-database"></i>
            <span>Profil</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('profil.profil_sekolah') }}">Visi Misi dan Tujuan</a>
                <a class="collapse-item" href="{{ route('profil.sejarah') }}">Sejarah Singkat</a>
                <a class="collapse-item" href="{{ route('profil.struktur') }}">Struktur Organisasi</a>
            </div>
        </div>
    </li>
    {{-- @endif --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTentangKami"
            aria-expanded="true" aria-controls="collapseTentangKami">
            <i class="fas fa-fw fa-users"></i>
            <span>Tentang Kami</span>
        </a>
        <div id="collapseTentangKami" class="collapse" aria-labelledby="headingTentangKami"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pegawai') }}">Data Guru dan Staff</a>
                <a class="collapse-item" href="{{ route('siswa') }}">Data Siswa</a>
                <a class="collapse-item" href="{{ route('sarana') }}">Sarana dan Prasarana</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Informasi Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" 
        aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Informasi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('berita') }}">Berita</a>
                <a class="collapse-item" href="{{ route('ekstra') }}">Ekstrakulikuler</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Galeri Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('galeri') }}">
        <i class="fas fa-fw fa-photo-video"></i>
        <span>Galeri</span>
    </a>
    </li>

     <!-- Nav Item - PPDB Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('ppdb') }}">
        <i class="fas fa-fw fa-photo-video"></i>
        <span>PPDB</span>
    </a>
    </li>

    <!-- Nav Item - User Collapse Menu -->
    {{-- @if (auth()->user()->role == 'admin') --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Akun</span>
        </a>
    </li>
    {{-- @endif --}}

    <!-- Nav Item - Kontak Collapse Menu -->
    {{-- @if (auth()->user()->role == 'admin') --}}
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-phone"></i>
            <span>Kontak</span>
        </a>
    </li>
    {{-- @endif --}}
</ul>