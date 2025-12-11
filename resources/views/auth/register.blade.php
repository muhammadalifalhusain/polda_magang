@extends('layouts.app')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow-x: hidden;
    }

    .login-bg-full {
        background: url('{{ asset('assets/img/gedung.png') }}') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .bg-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.55), rgba(0,0,0,0.30));
        z-index: 1;
    }

    .login-panel {
        position: relative;
        z-index: 2;
        width: 45%;
        height: auto;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        backdrop-filter: blur(3px);
    }

    .login-form-wrapper {
        width: 100%;
        max-width: 520px;
        background: #ffffffea;
        padding: 40px;
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.35);
    }

    .btn-login {
        background: linear-gradient(135deg, #39312f, #2a2421);
        color: #ff5821;
        padding: 14px;
        border-radius: 10px;
        font-weight: 600;
        border: none;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 16px;
        border: 2px solid #ececec;
    }

    /* ============================
       MOBILE RESPONSIVE
       ============================ */
    @media (max-width: 992px) {
        .login-panel {
            width: 70%;
            padding: 20px;
            min-height: auto;
        }
    }

    @media (max-width: 768px) {
        .login-bg-full {
            padding: 15px;
        }

        .login-panel {
            width: 100%;
            min-height: auto;
            padding: 10px;
            backdrop-filter: blur(6px);
        }

        .login-form-wrapper {
            padding: 30px;
            width: 100%;
            max-width: 100%;
            border-radius: 12px;
        }
    }

    @media (max-width: 480px) {
        .login-form-wrapper {
            padding: 25px;
        }

        .btn-login {
            font-size: 0.95rem;
            padding: 12px;
        }
    }
</style>


<div class="login-bg-full">
    <div class="bg-overlay"></div>

    <div class="login-panel">

        <div class="login-form-wrapper">

            {{-- Tampilkan Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.process') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                           required placeholder="Masukkan nama lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                           required placeholder="Masukkan email aktif">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control"
                           required placeholder="Masukkan password">
                </div>

                {{-- role default user --}}
                <input type="hidden" name="role" value="user">

                <button type="submit" class="btn btn-login w-100 mb-3">
                    Buat Akun
                </button>

                <div class="text-center">
                    <small>Sudah punya akun?
                        <a href="{{ route('login') }}" style="color: #ff5821;">Masuk sekarang</a>
                    </small>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection
