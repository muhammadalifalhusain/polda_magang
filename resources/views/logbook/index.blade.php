@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h2>Logbook Magang</h2>

    <a href="#" class="btn btn-primary mb-3">+ Tambah Logbook</a>

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
