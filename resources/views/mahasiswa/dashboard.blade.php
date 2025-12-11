@extends('layouts.mahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        Selamat Datang, {{ $user->name }}
                    </h4>
                </div>

                <div class="card-body">

                    <div class="text-center mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff"
                             class="rounded-circle shadow"
                             width="120">
                    </div>

                    <table class="table">
                        <tr>
                            <th width="35%">Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <span class="badge bg-success">Mahasiswa</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Login Terakhir</th>
                            <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
                        </tr>

                        {{-- Tambahan Field Baru --}}
                        <tr>
                            <th>Kode Pengajuan</th>
                            <td>
                                @if($pengajuan)
                                    <strong>{{ $pengajuan->tracking_code }}</strong>
                                @else
                                    <span class="text-danger">Belum mengajukan</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Status Pengajuan</th>
                            <td>
                                @if(isset($statusPengajuan))
                                    @if($statusPengajuan->status == 0)
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($statusPengajuan->status == 1)
                                        <span class="badge bg-success">Diterima</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                @else
                                    <span class="text-danger">Belum ada status</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    {{-- Tombol Aksi Jika Diterima --}}
                    @if(isset($statusPengajuan) && $statusPengajuan->status == 1)
                        <div class="text-center mt-3">
                            <a href="{{ route('user.logbook.index') }}"
                               class="btn btn-primary">
                                Isi Logbook
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
