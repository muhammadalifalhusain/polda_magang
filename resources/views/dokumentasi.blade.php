@extends('layouts.app')

@section('title', 'Dokumentasi Kegiatan')

@section('content')

<div class="head">
    <div class="head-h4">
        <h4>Dokumentasi</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Kegiatan</span>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Dokumentasi</span>
    </div>
</div>

<section class="py-4">
    <div class="container">

        <h2 class="fw-bold mb-3 text-center" style="color:#d35400;">Dokumentasi Kegiatan</h2>
        <p class="text-center text-muted mb-4">Foto-foto kegiatan yang dilakukan selama masa magang.</p>

        <div class="row g-4">

            @php
                $galeri = [
                    'apel.jpg', 'rapat.jpg', 'kunjungan.jpg',
                    'latihan.jpg', 'projek.jpg', 'presentasi.jpg'
                ];
            @endphp

            @foreach($galeri as $foto)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('assets/img/kegiatan/'.$foto) }}"
                         class="card-img-top"
                         alt="Foto Kegiatan">

                    <div class="card-body text-center">
                        <a href="{{ asset('assets/img/kegiatan/'.$foto) }}"
                           class="btn btn-sm btn-outline-primary">
                           Lihat Foto
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
