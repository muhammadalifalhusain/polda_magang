@extends('layouts.admin')

@section('content')

@php
    // Pastikan $status selalu ada agar tidak error
    $status = $status ?? 0;
@endphp

<h3>Manajemen Pengajuan Magang</h3>
<hr>

{{-- DEBUG --}}
{{-- {{ $cek_view ?? '' }} --}}

{{-- TAB FILTER STATUS --}}
<ul class="nav nav-tabs mb-3">

    <li class="nav-item">
        <a class="nav-link {{ $status == 0 ? 'active' : '' }}" 
           href="{{ route('admin.dashboard', ['status' => 0]) }}">
            Pending
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $status == 1 ? 'active' : '' }}" 
           href="{{ route('admin.dashboard', ['status' => 1]) }}">
            Diterima
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $status == 2 ? 'active' : '' }}" 
           href="{{ route('admin.dashboard', ['status' => 2]) }}">
            Ditolak
        </a>
    </li>

</ul>

{{-- TABLE --}}
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Tracking</th>
            <th>Nama</th>
            <th>Universitas</th>
            <th>Semester</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($data as $item)
            <tr>
                <td>{{ $item->tracking_code }}</td>
                <td>{{ $item->pengajuan->nama }}</td>
                <td>{{ $item->pengajuan->universitas }}</td>
                <td>{{ $item->pengajuan->semester }}</td>
                <td>
                    {{ $item->pengajuan->tanggal_mulai }} 
                    -
                    {{ $item->pengajuan->tanggal_selesai }}
                </td>
                <td>
                    <a href="{{ route('admin.detail', $item->id) }}" 
                       class="btn btn-primary btn-sm">
                        Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
