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

        <!-- Visi & Misi -->
        <div class="visi-misi-box mt-4 p-4"
            data-aos="fade-up"
            style="background: #faf6f2; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">

            <h3 class="fw-bold text-dark">Visi</h3>
            <p class="mt-2" style="font-size: 16px; max-width: 850px; margin: auto; line-height: 1.7;">
                "Menampilkan Polda Jawa Tengah yang Profesional, Bermoral, Modern sebagai Pelindung,
                Pengayom, dan Pelayan Masyarakat yang terpercaya dalam pemeliharaan Kemanan ketertiban
                Masyarakat dan Penegakkan Hukum."
            </p>

            <h3 class="fw-bold text-dark mt-4">Misi</h3>
            <p class="mt-2" style="font-size: 16px; max-width: 850px; margin: auto; line-height: 1.8;">
                1. Meningkatkan Sumber Daya Manusia Kepolisian Daerah Jawa Tengah Untuk Tampil sebagai sosok Pengayom, Pelindung dan Pelayan Masyarakat.<br><br>
                2. Melaksanakan Penegakkan Hukum secara Konsisten, Berkesinambungan dan Transparan untuk pemeliharaan Kamtibmas.<br><br>
                3. Melaksanakan Pelayanan Optimal yang dapat menimbulkan kepercayaan bagi Masyarakat dalam upaya meningkatkan kesadaran hukum.<br><br>
                4. Menciptakan kondisi keamanan yang kondusif dengan meningkatkan peran serta masyarakat dan instansi terkait secara aktif.<br><br>
                5. Mengedepankan dan Menjunjung Tinggi Hak Asasi Manusia dalam setiap pelaksanaan tugas.
            </p>

        </div>

    </div>
</section>

@endsection
