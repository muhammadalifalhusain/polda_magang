@extends('layouts.app')

@section('title', 'Polda Jateng')

@section('content')

<section id="hero" class="flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
        <h1>BIDTIK POLDA JATENG</h1>
        <h2>Semarang, Jawa Tengah</h2>
        <div class="d-flex align-items-center">
            <i class="bx bxs-right-arrow-alt get-started-icon"></i>
            <a href="{{ url('auth/register') }}" class="btn-get-started scrollto">Daftar</a>
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

@endsection
