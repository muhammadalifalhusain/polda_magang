@extends('layouts.app')

@section('title', 'Polda Jateng')

@section('content')

<section id="hero" class="flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
        <h1>BIDTIK POLDA JATENG</h1>
        <h2>Semarang, Jawa Tengah</h2>
        <div class="d-flex align-items-center">
            <i class="bx bxs-right-arrow-alt get-started-icon"></i>
            <a href="{{ url('pendaftaran') }}" class="btn-get-started scrollto">Daftar</a>
        </div>
    </div>
</section>

<section id="why-us" class="why-us">
    <div class="container">
        <div class="row">
            <div data-aos="fade-up">
                <div class="content">
                    <h3>Selamat Datang</h3>
                    <p>
                        Selamat datang di Sistem Pendaftaran Mahasiswa Magang.
                        Platform ini membantu Anda mendaftar magang, mengisi laporan kegiatan (logbook), 
                        dan mengakses informasi terkait program magang.
                        <br><br>
                        Semoga layanan ini memudahkan proses Anda selama mengikuti kegiatan magang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row justify-content-center text-center">

    <div class="col-xl-4 col-lg-4 mt-4" data-aos="fade-up">
        <div class="info-box text-center">
            <i class="bx bx-map"></i>
            <h3>Alamat Kami</h3>
            <p>Jl. Pahlawan No. 1 Mugassari, Semarang, Jawa Tengah</p>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
        <div class="info-box text-center">
            <i class="bx bx-envelope"></i>
            <h3>Email Kami</h3>
            <p>bidtik.jateng@polri.go.id</p>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
        <div class="info-box text-center">
            <i class="bx bx-phone-call"></i>
            <h3>Hubungi Kami</h3>
            <p>(024) 8413544</p>
        </div>
    </div>

</div>

@endsection
