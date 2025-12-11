@extends('layouts.app')

@section('title', 'Agenda Kegiatan Magang')

@section('content')

<div class="head">
    <div class="head-h4">
        <h4>Agenda Kegiatan</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Kegiatan</span>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Agenda</span>
    </div>
</div>

<section class="py-4">
    <div class="container">
        <h2 class="fw-bold mb-3 text-center" style="color:#d35400;">Agenda Kegiatan Magang</h2>
        <p class="text-center text-muted mb-4">Jadwal kegiatan yang harus diikuti oleh peserta magang.</p>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- List Agenda -->
                @php
                    $agenda = [
                        ['tanggal' => '12 Januari 2025', 'kegiatan' => 'Apel Pagi & Briefing Pembimbing'],
                        ['tanggal' => '14 Januari 2025', 'kegiatan' => 'Pengumpulan Logbook Mingguan'],
                        ['tanggal' => '17 Januari 2025', 'kegiatan' => 'Sosialisasi Aplikasi Klepon.in'],
                        ['tanggal' => '20 Januari 2025', 'kegiatan' => 'Praktik Lapangan Unit Lantas'],
                        ['tanggal' => '25 Januari 2025', 'kegiatan' => 'Evaluasi Tengah Bulan'],
                    ];
                @endphp

                <ul class="list-group shadow-sm">
                    @foreach($agenda as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ $item['tanggal'] }}</span>
                            <span>{{ $item['kegiatan'] }}</span>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</section>

@endsection
