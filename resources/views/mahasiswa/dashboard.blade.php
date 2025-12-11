@extends('layouts.mahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        Selamat Datang, {{ auth()->user()->name }}
                    </h4>
                </div>

                <div class="card-body">

                    <div class="text-center mb-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff"
                             class="rounded-circle shadow"
                             width="120">
                    </div>

                    <table class="table">
                        <tr>
                            <th width="35%">Nama</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>
                                <span class="badge bg-success">Mahasiswa</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Login Terakhir</th>
                            <td>{{ auth()->user()->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
