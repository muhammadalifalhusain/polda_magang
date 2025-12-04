@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="max-width: 550px; width: 100%; border-radius: 18px;">
        
        <div class="text-center mb-4">
            <div class="text-success mb-2" style="font-size: 40px;">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h3 class="fw-bold text-success">Pengajuan Berhasil Dikirim!</h3>
        </div>

        <p class="text-center mb-2">Berikut kode status pengajuan Anda:</p>

        {{-- Kotak Tracking Code Dengan Tombol Copy --}}
        <div class="d-flex justify-content-between align-items-center p-3 mb-3 border rounded"
             style="background: #f0f8ff; border-color: #bcdfff !important;">

            <h2 class="fw-bold text-primary mb-0" id="trackingCode" style="letter-spacing: 2px;">
                {{ $tracking }}
            </h2>

            <button class="btn btn-outline-primary btn-sm ms-3" 
                    onclick="copyTrackingCode()" id="copyButton"
                    title="Salin kode">
                <i class="bi bi-clipboard" id="copyIcon"></i>
            </button>
        </div>

        {{-- ⚠ Warning Message --}}
        <div class="alert text-center fw-semibold" 
            style="border-radius: 10px; background:#d9534f; color:white;">
            ⚠ Wajib menyimpan kode pendaftaran ini!<br>
            Kode digunakan untuk melihat status pengajuan Anda.
        </div>


        <hr class="my-4">

        <p class="text-center">
            Kode ini dapat digunakan untuk melihat status pengajuan magang Anda.<br>
            <strong class="text-dark">Mohon ditunggu hingga 7 hari kerja ke depan.</strong>
        </p>

        <div class="d-flex justify-content-center mt-3">
            <a href="/" 
                class="btn px-4 py-2" 
                style="border-radius: 10px; background:#39312f; color:#ff5821; font-weight:600;">Kembali ke Beranda
            </a>

        </div>

    </div>
</div>

{{-- Script Copy --}}
<script>
    function copyTrackingCode() {
        const code = document.getElementById('trackingCode').innerText;

        navigator.clipboard.writeText(code).then(() => {
            document.getElementById('copyIcon').classList.remove('bi-clipboard');
            document.getElementById('copyIcon').classList.add('bi-clipboard-check');

            setTimeout(() => {
                document.getElementById('copyIcon').classList.remove('bi-clipboard-check');
                document.getElementById('copyIcon').classList.add('bi-clipboard');
            }, 1500);
        });
    }
</script>

@endsection
