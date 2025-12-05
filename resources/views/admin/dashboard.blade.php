@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<section class="container mt-5">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, {{ auth()->user()->name }}</p>

    <table class="table table-bordered mt-3" style="max-width: 400px;">
        <tr>
            <th>Email</th>
            <td>{{ auth()->user()->email }}</td>
        </tr>
        <tr>
            <th>Password (hashed)</th>
            <td>{{ auth()->user()->password }}</td>
        </tr>
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>

</section>

@endsection