@extends('layouts.app')

@section('title', 'Kegiatan Polda Jateng')

@section('content')

<!-- Breadcrumb -->
<div class="head">
    <div class="head-h4">
        <h4>Kegiatan</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Kegiatan</span>
    </div>
</div>

<!-- Header Section -->
<section class="py-4 text-center">
    <div class="container" data-aos="fade-up">
        <h2 class="fw-bold" style="color:#d35400;">Kegiatan Magang Polda Jateng</h2>
        <p class="text-muted">
            Kumpulan aktivitas penting yang dapat diakses peserta magang Polda Jawa Tengah.
        </p>
    </div>
</section>

<!-- Grid Kegiatan -->
<section class="py-4">
    <div class="container">

        <div class="row g-4 justify-content-center">

            <!-- AGENDA -->
            <div class="col-md-3">
                <div class="card kegiatan-card h-100 shadow-sm text-center p-4" data-aos="zoom-in">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-calendar-event" 
                           style="font-size:55px; color:#d35400;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Agenda Kegiatan</h5>
                    <a href="{{ url('kegiatan/agenda') }}" class="stretched-link"></a>
                </div>
            </div>

            <!-- DOKUMENTASI -->
            <div class="col-md-3">
                <div class="card kegiatan-card h-100 shadow-sm text-center p-4" data-aos="zoom-in">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-camera-fill" 
                           style="font-size:55px; color:#2980b9;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Dokumentasi</h5>
                    <a href="{{ url('kegiatan/dokumentasi') }}" class="stretched-link"></a>
                </div>
            </div>

            <!-- MODUL MAGANG -->
            <div class="col-md-3">
                <div class="card kegiatan-card h-100 shadow-sm text-center p-4" data-aos="zoom-in">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-journal-bookmark-fill" 
                           style="font-size:55px; color:#16a085;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Modul Magang</h5>
                    <a href="{{ url('kegiatan/modul') }}" class="stretched-link"></a>
                </div>
            </div>

            <!-- SARAN DAN MASUKAN -->
            <div class="col-md-3">
                <div class="card kegiatan-card h-100 shadow-sm text-center p-4" data-aos="zoom-in">
                    <div class="icon-wrapper mb-3">
                        <i class="bi bi-chat-dots-fill" 
                           style="font-size:55px; color:#c0392b;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Saran & Masukan</h5>
                    <a href="{{ url('kegiatan/saran') }}" class="stretched-link"></a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
