@extends('layouts.mahasiswa')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width:100%; border-radius: 18px;">

        <h3 class="text-center fw-bold mb-3">Cek Status Pengajuan</h3>
        <p class="text-center text-muted">
            Masukkan kode tracking yang Anda dapatkan saat melakukan pendaftaran.
        </p>

        {{-- Notifikasi Error --}}
        @if(session('error'))
            <div class="alert text-white text-center fw-semibold" 
                 style="background:#d9534f; border-radius:10px;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('status.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <input type="text" name="tracking_code" 
                       class="form-control text-center"
                       placeholder="Masukkan Kode Tracking"
                       style="letter-spacing: 2px; font-weight:600;"
                       required>
            </div>

            <button type="submit" 
                    class="btn w-100 mt-2"
                    style="background:#39312f; color:#ff5821; font-weight:600; border-radius:10px;">
                Cek Status
            </button>
        </form>

    </div>
</div>

@endsection
