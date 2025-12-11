@extends('layouts.mahasiswa')

@section('content')
<div class="container">

    <h2>Logbook Magang</h2>

    {{-- CEK APAKAH USER SUDAH MEMILIKI NAMA PROJECT --}}
    @if (!$user->judul_project)
        <div class="alert alert-warning">
            Anda belum memiliki Nama Project. Silakan isi terlebih dahulu sebelum mengisi logbook.
        </div>

        <form action="{{ route('user.logbook.store.project') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Project</label>
                <input type="text" name="nama_project" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Nama Project</button>
        </form>

        <hr>

        {{-- Logbook tidak boleh diisi, jadi stop sampai sini --}}
        @return
    @endif

    {{-- JIKA NAMA PROJECT SUDAH ADA, TAMPILKAN --}}
    <div class="alert alert-info">
        <strong>Nama Project:</strong> {{ $user->judul_project }}
    </div>

    <a href="{{ route('user.logbook.create') }}" class="btn btn-primary mb-3">+ Tambah Logbook</a>


    @if ($logbooks->count() == 0)
        <div class="alert alert-info">Belum ada data logbook.</div>
    @endif

    <ul class="list-group">
        @foreach ($logbooks as $log)
            <li class="list-group-item">
                <strong>{{ $log->tanggal ?? 'Tanpa Tanggal' }}</strong><br>
                {{ $log->kegiatan }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
