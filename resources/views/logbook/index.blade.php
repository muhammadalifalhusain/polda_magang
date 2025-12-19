@extends('layouts.mahasiswa')

@section('content')
<style>
    .page-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #2D3436;
    }

    .project-box {
        background: #e3f2fd;
        padding: 18px;
        border-left: 5px solid #2196f3;
        border-radius: 10px;
        font-size: 16px;
        margin-bottom: 25px;
    }

    .logbook-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .logbook-card {
        background: white;
        padding: 20px;
        border-radius: 14px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: 0.3s;
        border: 1px solid #f1f1f1;
    }

    .logbook-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .log-date {
        font-weight: bold;
        font-size: 15px;
        color: #1565c0;
        margin-bottom: 8px;
    }

    .log-text {
        color: #424242;
        font-size: 14px;
    }

    .btn-add-log {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #1565c0 !important;
        color: white;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .btn-add-log:hover {
        background: #0d47a1 !important;
    }
</style>

<div class="container">

    <h2 class="page-title">📘 Logbook Magang</h2>

    {{-- CEK APAKAH USER SUDAH MEMILIKI NAMA PROJECT --}}
    @if (!$user->judul_project)
        <div class="alert alert-warning">
            <strong>⚠️ Anda belum memiliki Nama Project.</strong><br>
            Silakan isi terlebih dahulu sebelum mengisi logbook.
        </div>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('user.logbook.store.project') }}" method="POST">
                @csrf
                <label class="form-label">Nama Project</label>
                <input type="text" name="nama_project" class="form-control mb-3" required>

                <button type="submit" class="btn btn-success w-100">
                    Simpan Nama Project
                </button>
            </form>
        </div>

        @return
    @endif

    {{-- TAMPILKAN NAMA PROJECT --}}
    <div class="project-box">
        <strong>📌 Nama Project :</strong> {{ $user->judul_project }}
    </div>

    {{-- PESAN JIKA KOSONG --}}
    @if ($logbooks->count() == 0)
        <div class="alert alert-info shadow-sm">
            Belum ada logbook. Tekan tombol + untuk menambahkan.
        </div>
    @endif

    {{-- GRID CARD LOGBOOK --}}
    <div class="logbook-grid">
        @foreach ($logbooks as $log)
            <div class="logbook-card">
                <div class="log-date">
                    📅 {{ $log->tanggal ? date('d M Y', strtotime($log->tanggal)) : 'Tanpa Tanggal' }}
                </div>
                <div class="log-text">
                    {{ $log->kegiatan }}
                </div>
            </div>
        @endforeach
    </div>

    {{-- TOMBOL FLOATING UNTUK TAMBAH --}}
    <a href="{{ route('user.logbook.create') }}" class="btn btn-add-log">
        +
    </a>
</div>
@endsection
