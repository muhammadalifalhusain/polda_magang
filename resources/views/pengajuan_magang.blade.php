@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h3 class="mb-4">Form Pengajuan Magang</h3>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Asal Universitas</label>
            <input type="text" name="universitas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Semester</label>
            <input type="number" name="semester" min="1" max="14" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Mulai Magang</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Selesai Magang</label>
                <input type="date" name="tanggal_selesai" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Lampiran Surat dari Kampus (PDF)</label>
            <input type="file" name="surat_pdf" accept="application/pdf" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100" type="submit">
            <i class="bx bx-send"></i> Kirim Pendaftaran
        </button>
    </form>
</div>

@endsection
