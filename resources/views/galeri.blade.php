@extends('layouts.app')

@section('title', 'Galeri Polda Jateng')

@section('content')

<style>
    .portfolio-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: 0.3s ease-in-out;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        padding: 0;
    }

    .portfolio-item img {
        transition: transform 0.4s ease;
        border-radius: 12px;
    }

    .portfolio-item:hover img {
        transform: scale(1.08);
    }

    .portfolio-info {
        text-align: left;
        padding: 15px;
        background: white;
        border-top: 1px solid #eee;
        border-radius: 0 0 12px 12px;
    }

    .badge-kategori {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #d35400;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 10;
        box-shadow: 0 3px 6px rgba(0,0,0,0.2);
    }

    .portfolio-item:hover .portfolio-info h4 {
        color: #d35400;
    }
</style>

<!-- Breadcrumb -->
<div class="head">
    <div class="head-h4">
        <h4>Galeri</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <a class="bi-arrow-right mx-1"></a>
        <a href="#">Profil</a>
        <a class="bi-arrow-right mx-1"></a>
        <a href="#">Galeri</a>
    </div>
</div>

<!-- Galeri Section -->
<main>
    <section id="portfolio" class="portfolio section-bg py-4">
        <div class="container">

            <div class="section-title text-center mb-4">
                <h2 data-aos="fade-up" class="fw-bold" style="color: #d35400;">Galeri & Dokumentasi</h2>
                <p data-aos="fade-up" class="text-muted">
                    Kumpulan momen penting, kegiatan, dan dokumentasi dari Polda Jawa Tengah.
                </p>
            </div>

            <div class="row g-4 portfolio-container mt-2" data-aos="fade-up">

                <!-- ITEM TEMPLATE -->
                @php
                    $items = [
                        ['img' => 'kapolda.jpg', 'judul' => 'Upacara Sertijab Polda Jateng', 'desc' => 'Waka Polda & Pejabat Utama Baru', 'kat' => 'Upacara'],
                        ['img' => 'lemdiklat.jpg', 'judul' => 'Biro SDM Polda Jateng', 'desc' => 'Serah Terima 246 Calon Siswa Polri', 'kat' => 'SDM'],
                        ['img' => 'asistensi.jpeg', 'judul' => 'Evaluasi & Penegakan Hukum', 'desc' => 'Kunjungan Tim Asistensi Polri', 'kat' => 'Asistensi'],
                        ['img' => 'banjir.jpg', 'judul' => 'Solidaritas Bencana Banjir', 'desc' => 'Bantuan Logistik di Kaligawe', 'kat' => 'Bencana'],
                        ['img' => 'atsi.jpg', 'judul' => 'Launching Klepon.in', 'desc' => 'Kolaborasi ATSI & Polda Jateng', 'kat' => 'Kolaborasi'],
                        ['img' => 'natal.jpg', 'judul' => 'Pengamanan Natal', 'desc' => 'Polda Jateng Siapkan Pengamanan Gereja', 'kat' => 'Keamanan'],
                        ['img' => 'dilantik.jpg', 'judul' => 'Sertijab 4 Kapolres', 'desc' => 'Tugas Baru Kamtibmas', 'kat' => 'Sertijab'],
                    ];
                @endphp

                @foreach ($items as $item)
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <span class="badge-kategori">{{ $item['kat'] }}</span>
                    <img src="{{ asset('assets/img/' . $item['img']) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $item['judul'] }}</h4>
                        <p class="text-muted">{{ $item['desc'] }}</p>
                        <a href="{{ asset('assets/img/' . $item['img']) }}"
                           data-gallery="portfolioGallery"
                           class="portfolio-lightbox preview-link">
                           <i class="bx bx-plus fs-3"></i>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- tombol lihat semua -->
            <div class="text-center mt-5">
                <a href="#" class="btn btn-lg px-4" style="border-radius: 30px; border: 2px solid #d35400; color: #d35400;">
                    <i class="bi bi-images me-2"></i> Lihat Koleksi Lengkap
                </a>
            </div>

        </div>
    </section>
</main>

@endsection
