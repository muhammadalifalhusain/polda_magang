@extends('layouts.mahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')

<style>
    /* CARD */
    .profile-card {
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        background: #ffffff;
        padding: 22px;
        max-width: 650px;
        margin: auto;
        box-shadow: 0 3px 10px rgba(0,0,0,0.06);
    }

    /* AVATAR */
    .profile-avatar {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        margin-bottom: 12px;
        border: 3px solid #f3f4f6;
    }

    .profile-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #111827;
        margin-bottom: 2px;
    }

    /* TABLE */
    .profile-table th {
        width: 40%;
        font-weight: 600;
        padding: 8px 0;
        color: #374151;
    }

    .profile-table td {
        color: #1f2937;
        padding: 8px 0;
    }

    /* BADGE */
    .badge-status {
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* TAMPILAN LEBIH RINGKAS */
    .section-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #6b7280;
        margin-top: 15px;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
</style>

<div class="container py-4">

    <div class="profile-card">

        <div class="text-center">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff"
                 class="profile-avatar shadow-sm">

            <div class="profile-title">{{ $user->name }}</div>
            <div class="text-muted mb-3">Mahasiswa</div>
        </div>

        <div class="section-title">Informasi Akun</div>
        <table class="table profile-table">
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>Login Terakhir</th>
                <td>{{ $user->updated_at->format('d M Y H:i') }}</td>
            </tr>
        </table>

        <div class="section-title">Informasi Pengajuan</div>
        <table class="table profile-table">
            <tr>
                <th>Judul Project</th>
                <td>{{ $user->judul_project ?? '-' }}</td>
            </tr>

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
                <th>Status</th>
                <td>
                    @if(isset($statusPengajuan))
                        @if($statusPengajuan->status == 0)
                            <span class="badge-status bg-warning text-dark">Pending</span>
                        @elseif($statusPengajuan->status == 1)
                            <span class="badge-status bg-success text-white">Diterima</span>
                        @else
                            <span class="badge-status bg-danger text-white">Ditolak</span>
                        @endif
                    @else
                        <span class="text-danger">Belum ada status</span>
                    @endif
                </td>
            </tr>
        </table>

        @if(isset($statusPengajuan) && $statusPengajuan->status == 1)
            <div class="text-center mt-3">
                <a href="{{ route('user.logbook.index') }}" class="btn btn-primary px-4">
                    Isi Logbook
                </a>
            </div>
        @endif

    </div>

</div>

@endsection
