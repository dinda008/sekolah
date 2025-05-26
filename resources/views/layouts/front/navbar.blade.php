<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">SMP NEGERI 2 PRAJEKAN</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="{{ request()->routeIs('home.visi_misi_tujuan', 'home.sejarah', 'home.struktur_organisasi') ? 'active' : '' }}">
                        Profil
                    </a>
                    <ul>
                        <li><a href="{{ route('home.visi_misi_tujuan') }}">Visi Misi dan Tujuan</a></li>
                        <li><a href="{{ route('home.sejarah') }}">Sejarah Singkat</a></li>
                        <li><a href="{{ route('home.struktur_organisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="{{ request()->routeIs('home.pegawai', 'home.siswa', 'home.sarana_prasarana') ? 'active' : '' }}">
                        Tentang Kami
                    </a>
                    <ul>
                        <li><a href="{{ route('home.pegawai') }}">Data Pegawai</a></li>
                        <li><a href="{{ route('home.siswa') }}">Data Siswa</a></li>
                        <li><a href="{{ route('home.sarana_prasarana') }}">Sarana dan Prasarana</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('home.galeri') }}" class="{{ request()->routeIs('home.galeri', 'home.galeri.tampilkan') ? 'active' : '' }}">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.berita') }}" class="{{ request()->routeIs('home.berita', 'home.berita.show') ? 'active' : '' }}">
                        Berita
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.ppdb') }}" class="{{ request()->routeIs('home.ppdb') ? 'active' : '' }}">
                        PPDB
                    </a>
                </li>

                <li>
                    <a href="{{ route('home.kontak') }}" class="{{ request()->routeIs('home.kontak') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>
            </ul>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
