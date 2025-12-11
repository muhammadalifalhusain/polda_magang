@extends('layouts.app')

@section('title', 'Struktur Polda Jateng')

@section('content')

<div class="head">
    <div class="head-h4">
        <h4>Struktur Polda</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <a class="bi-arrow-right mx-1"></a>
        <a href="#">Profil Polda</a>
        <a class="bi-arrow-right mx-1"></a>
        <a href="#">Struktur Polda</a>
    </div>
</div>

<section class="struktur-section py-4">
    <div class="container" style="max-width: 1100px;">

        <!-- Judul -->
        <div class="text-center mb-4" data-aos="fade-up">
            <h2 class="fw-bold" style="color: #d35400;">Struktur Polda Jawa Tengah</h2>
            <p class="text-muted">Struktur organisasi Polda Jawa Tengah sesuai pembagian fungsi dan wewenang.</p>
        </div>

        <!-- Gambar Struktur -->
        <div class="struktur-image text-center mb-5" data-aos="fade-right">
            <img src="{{ asset('assets/img/strukturpolda.png') }}"
                alt="Struktur Polda Jateng"
                class="img-fluid shadow rounded"
                style="max-width: 90%; border-radius: 10px;">
        </div>

        <!-- Informasi Tambahan (Agar Tidak Sepi) -->
        <div class="row g-4">

            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color: #d35400;">Kapolda</h5>
                        <p class="text-muted mb-0">
                            Memimpin keseluruhan struktur organisasi Polda Jawa Tengah dan bertanggung jawab
                            terhadap arah kebijakan strategis serta operasional kepolisian daerah.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color: #d35400;">Wakapolda</h5>
                        <p class="text-muted mb-0">
                            Membantu Kapolda dalam mengawasi, mengkoordinasikan, dan mengevaluasi pelaksanaan
                            tugas seluruh satuan kerja di lingkungan Polda Jawa Tengah.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold" style="color: #d35400;">Satuan Kerja</h5>
                        <p class="text-muted mb-0">
                            Terdiri dari berbagai fungsi seperti Reskrim, Lalu Lintas, Intelkam, Samapta, SDM,
                            Logistik, dan lainnya yang menjalankan tugas berdasarkan bidang masing-masing.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Penutup -->
        <div class="text-center mt-5" data-aos="fade-up">
            <p class="text-muted">
                Struktur ini menjadi dasar penyelenggaraan tugas kepolisian dalam menjaga keamanan,
                ketertiban, dan memberikan pelayanan terbaik kepada masyarakat Jawa Tengah.
            </p>
        </div>

    </div>
</section>

@endsection
