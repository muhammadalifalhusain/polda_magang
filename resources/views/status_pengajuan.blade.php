@extends('layouts.mahasiswa')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="max-width: 600px; width:100%; border-radius: 18px;">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Status Pengajuan Magang</h3>
            <p class="text-muted">Berikut informasi status berdasarkan kode tracking Anda</p>
        </div>

        {{-- Tracking Code --}}
        <div class="mb-4 text-center">
            <p class="fw-semibold mb-1">Tracking Code Anda:</p>
            <h3 class="fw-bold" style="letter-spacing: 2px; color: #ff5821;">
                {{ $status->tracking_code }}
            </h3>
        </div>
        @php
            $statusText = [
                0 => ['label' => 'Pending', 'color' => '#ffc107', 'icon' => 'bi-clock-fill'],
                1 => ['label' => 'Diterima', 'color' => '#28a745', 'icon' => 'bi-check-circle-fill'],
                2 => ['label' => 'Ditolak', 'color' => '#dc3545', 'icon' => 'bi-x-circle-fill'],
            ];
        @endphp

        <div class="p-3 mb-3 border rounded text-center"
             style="background:#f3f3f3; border-color:#ddd !important;">
            <h4 class="fw-bold" style="color: {{ $statusText[$status->status]['color'] }};">
                <i class="bi {{ $statusText[$status->status]['icon'] }}"></i>
                {{ $statusText[$status->status]['label'] }}
            </h4>
        </div>

        {{-- Keterangan --}}
        <div class="mb-3">
            <h6 class="fw-bold">Keterangan:</h6>
            <p class="text-muted">
                {{ $status->keterangan ? $status->keterangan : 'Belum ada keterangan tambahan.' }}
            </p>
        </div>
        <div class="mb-4">
            <h6 class="fw-bold">Terakhir Diperbarui:</h6>
            <p class="text-muted">{{ $status->updated_at->format('d-m-Y H:i') }} WIB</p>
        </div>
        <div class="text-center">
            <a href="/" 
               class="btn px-4 py-2"
               style="border-radius: 10px; background:#39312f; color:#ff5821; font-weight:600;">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection
