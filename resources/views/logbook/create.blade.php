@extends('layouts.mahasiswa')

@section('title', 'Tambah Logbook')

@section('content')

<style>
    /* Background smooth */
    body {
        background: linear-gradient(135deg, #4b6cb7, #182848);
        background-attachment: fixed;
    }

    /* Card glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 18px;
        padding: 25px;
        border: 1px solid rgba(255,255,255,0.15);
        box-shadow: 0 8px 20px rgba(0,0,0,0.18);
        animation: fadeIn 0.5s ease;
    }

    /* Title bar */
    .page-title {
        color: #fff;
        font-weight: 700;
        font-size: 28px;
        margin-bottom: 20px;
        letter-spacing: 1px;
    }

    /* Input styling */
    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 12px;
        color: #fff;
        font-weight: 500;
    }

    .form-control::placeholder {
        color: rgba(255,255,255,0.7);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        color: #fff;
        box-shadow: 0 0 10px rgba(255,255,255,0.3);
    }

    /* Label */
    label {
        font-weight: 600;
        color: #fff;
        margin-bottom: 5px;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #00c6ff, #0072ff);
        border: none;
        padding: 12px 22px;
        font-weight: 600;
        border-radius: 12px;
        transition: 0.3s;
        color: #fff;
        width: 100%;
        font-size: 16px;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 14px rgba(0,0,0,0.25);
    }

    /* Fade animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>


<div class="container mt-5" style="max-width: 700px;">

    <h2 class="page-title text-center">
        Tambah Logbook Magang
    </h2>

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success glass-card text-white">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger glass-card text-white">
            {{ session('error') }}
        </div>
    @endif

    <div class="glass-card">
        <form action="{{ route('user.logbook.store') }}" method="POST">
            @csrf

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" id="tanggal"
                       class="form-control @error('tanggal') is-invalid @enderror"
                       value="{{ old('tanggal') }}">
                @error('tanggal')
                    <div class="invalid-feedback d-block text-white">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kegiatan --}}
            <div class="mb-3">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" name="kegiatan" id="kegiatan"
                       placeholder="Contoh: Membuat UI Dashboard Admin"
                       class="form-control @error('kegiatan') is-invalid @enderror"
                       value="{{ old('kegiatan') }}">
                @error('kegiatan')
                    <div class="invalid-feedback d-block text-white">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label for="deskripsi">Deskripsi (opsional)</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          placeholder="Tuliskan deskripsi pekerjaan kamu hari ini..."
                          class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback d-block text-white">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                Simpan Logbook
            </button>

        </form>
    </div>
</div>

@endsection
