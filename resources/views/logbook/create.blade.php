@extends('layouts.mahasiswa')

@section('title', 'Tambah Logbook')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Logbook</h2>

    {{-- Tampilkan notifikasi sukses / error --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            {{-- Form tambah logbook --}}
            <form action="{{ route('user.logbook.store') }}" method="POST">
                @csrf

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" 
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Kegiatan --}}
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" id="kegiatan"
                           class="form-control @error('kegiatan') is-invalid @enderror"
                           value="{{ old('kegiatan') }}">
                    @error('kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi (opsional)</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-primary">Simpan Logbook</button>
            </form>
        </div>
    </div>
</div>
@endsection
