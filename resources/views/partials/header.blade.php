<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="{{ url('/') }}" class="navbar-logo">Polda <span>Jateng</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <div class="dropdown">
                    <li><a class="dropbtn" href="{{ url('profil') }}">Profil Polda Jateng</a></li>
                    <div class="dropdown-content">
                        <a class="nav-link scrollto" href="{{ url('strukturpolda') }}">Struktur Polda</a>
                        <a class="nav-link scrollto" href="{{ url('galeri') }}">Galeri</a>
                    </div>
                </div>

                <li><a class="nav-link scrollto" href="{{ url('pendaftaran') }}">Pendaftaran</a></li>

                <div class="dropdown">
                    <li><a class="nav-link scrollto" href="{{ url('kegiatan') }}">Kegiatan</a></li>
                    <div class="dropdown-content">
                        <a class="nav-link scrollto" href="{{ url('logbook') }}">LOGBOOK</a>
                        <a class="nav-link scrollto" href="{{ url('bidang-kesehatan') }}">Daftar Mahasiswa</a>
                        <a class="nav-link scrollto" href="{{ url('bidang-kamtibmas') }}">Projek Magang</a>
                        <a class="nav-link scrollto" href="{{ url('saran') }}">Saran dan Masukkan</a>
                    </div>
                </div>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
