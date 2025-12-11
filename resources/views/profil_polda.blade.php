@extends('layouts.app')

@section('title', 'Profil Polda Jateng')

@section('content')

<div class="head">
    <div class="head-h4">
        <h4>Profil Polda Jateng</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <a class="bi-arrow-right mx-1"></a>
        <a href="#">Profil</a>
    </div>
</div>

<section class="kondisi-section py-5">
    <div class="container" style="max-width: 1000px; text-align: center;">

        <!-- Judul -->
        <h2 class="fw-bold" style="color: #d35400; margin-bottom: 20px;">
            Peta Wilayah
        </h2>

        <!-- Gambar Peta -->
        <div class="map-wrapper" data-aos="fade-up">
            <img src="{{ asset('assets/img/petawilayah.jpg') }}"
                alt="peta wilayah"
                class="img-fluid"
                style="display: block; margin: 0 auto; border-radius: 8px; max-width: 80%; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
        </div>

        <!-- ==========================
             VISI & MISI (BARU)
        =========================== -->
        <div class="mt-5" data-aos="fade-up">

            <div class="row g-4">

                <!-- Visi -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100 visi-card p-4 text-center">
                        <div class="icon-circle mb-3 mx-auto">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-3">Visi</h3>
                        <p class="text-muted" style="line-height: 1.8;">
                            Menampilkan Polda Jawa Tengah yang Profesional, Bermoral, Modern sebagai
                            Pelindung, Pengayom, dan Pelayan Masyarakat yang terpercaya dalam pemeliharaan
                            Keamanan Ketertiban Masyarakat dan Penegakkan Hukum.
                        </p>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100 misi-card p-4">
                        <div class="icon-circle mb-3 mx-auto">
                            <i class="bi bi-flag-fill"></i>
                        </div>
                        <h3 class="fw-bold text-dark text-center mb-3">Misi</h3>

                        <ul class="list-group list-group-flush styled-list">
                            <li class="list-group-item">
                                Meningkatkan SDM Kepolisian untuk tampil sebagai Pengayom, Pelindung, dan Pelayan Masyarakat.
                            </li>
                            <li class="list-group-item">
                                Melaksanakan penegakan hukum secara konsisten, berkesinambungan, dan transparan.
                            </li>
                            <li class="list-group-item">
                                Memberikan pelayanan optimal untuk meningkatkan kepercayaan masyarakat terhadap hukum.
                            </li>
                            <li class="list-group-item">
                                Menciptakan kondisi keamanan kondusif dengan peran aktif masyarakat dan instansi terkait.
                            </li>
                            <li class="list-group-item">
                                Menjunjung tinggi Hak Asasi Manusia dalam setiap pelaksanaan tugas.
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <!-- END VISI & MISI -->

    </div>
</section>

@endsection
