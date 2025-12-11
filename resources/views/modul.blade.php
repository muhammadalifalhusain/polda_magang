@extends('layouts.app')

@section('title', 'Modul & Materi Magang')

@section('content')

<div class="head">
    <div class="head-h4">
        <h4>Modul Magang</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Kegiatan</span>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Modul</span>
    </div>
</div>

<section class="py-4">
    <div class="container">

        <h2 class="fw-bold text-center mb-3" style="color:#d35400;">Modul dan Materi Magang</h2>
        <p class="text-center text-muted mb-4">Materi pembelajaran resmi untuk peserta magang Polda Jateng.</p>

        @php
            $modul = [
                ['judul' => 'Pengenalan Struktur Organisasi Polda Jateng', 'file' => 'struktur.pdf'],
                ['judul' => 'SOP Pelayanan Publik & Lalu Lintas', 'file' => 'sop_lalin.pdf'],
                ['judul' => 'Sistem Pelaporan & Logbook Magang', 'file' => 'logbook.pdf'],
                ['judul' => 'Pengantar Pembuatan Aplikasi Magang', 'file' => 'aplikasi.pdf']
            ];
        @endphp

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="list-group shadow-sm">
                    @foreach($modul as $item)
                    <a href="{{ asset('assets/modul/'.$item['file']) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span>{{ $item['judul'] }}</span>
                        <i class="bi bi-download"></i>
                    </a>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
