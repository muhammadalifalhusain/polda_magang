@extends('layouts.app')

@section('content')

<div class="container mt-5 text-center">
    <div class="card shadow p-4">
        <h3 class="mb-3 text-success">Pengajuan Berhasil Dikirim!</h3>

        <p class="mb-1">Berikut kode status pengajuan Anda:</p>

        <h2 class="fw-bold text-primary">{{ $tracking }}</h2>

        <p class="mt-3">
            Silakan simpan kode ini.<br>
            Anda dapat menggunakannya untuk melihat status pengajuan magang Anda.<br>
            <strong>Mohon ditunggu 7 hari kerja ke depan.</strong>
        </p>

        <a href="/" class="btn btn-outline-primary mt-3">
            Kembali ke Beranda
        </a>
    </div>
</div>

@endsection
