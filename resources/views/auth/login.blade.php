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
        height: 100vh;
        width: 100%;
        position: relative;
    }

    .bg-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.55), rgba(0,0,0,0.30));
    }
    .login-panel {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        width: 45%;
        backdrop-filter: blur(2px);
        background: rgba(255, 255, 255, 0.15);
        display: flex;
        justify-content: center;
        align-items: center;     
        padding-left: 40px;
        padding-right: 40px;
        border-left: 1px solid rgba(255,255,255,0.25);
        overflow-y: auto;
    }
    .login-form-wrapper {
        width: 100%;
        max-width: 520px;
        background: rgba(255,255,255,0.97);
        padding: 45px;
        border-radius: 18px;
        box-shadow: 0 25px 70px rgba(0,0,0,0.35);
        border: 1px solid rgba(255,255,255,0.35);
        backdrop-filter: blur(10px);

        margin-top: 20px;
    }

    .login-title {
        color: #39312f;
        font-size: 1.9rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
    }

    .login-subtitle {
        color: #777;
        margin-bottom: 1.8rem;
    }

    .form-control {
        border: 2px solid #ececec;
        padding: 12px 16px;
        border-radius: 10px;
    }

    .btn-login {
        background: linear-gradient(135deg, #39312f, #2a2421);
        color: #ff5821;
        padding: 14px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.05rem;
        border: none;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        color: #ff7043;
    }

    .alert {
        border-radius: 10px;
        padding: 12px 16px;
    }

    @media(max-width: 992px) {
        .login-panel { width: 55%; }
    }

    @media(max-width: 768px) {
        .login-panel {
            width: 100%;
            backdrop-filter: blur(6px);
        }
        .login-form-wrapper {
            max-width: 100%;
        }
    }
</style>

<div class="login-bg-full">
    <div class="bg-overlay"></div>

    <div class="login-panel">
        <div class="login-form-wrapper">

            <div class="text-center">
                <h3 class="login-title"><i class="bi bi-box-arrow-in-right me-2"></i>Selamat Datang</h3>
            </div>

            @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('status.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person-fill me-1"></i> Username</label>
                    <input type="text" name="username" class="form-control" required autocomplete="off" placeholder="Masukkan username Anda">
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-lock-fill me-1"></i> Password</label>
                    <input type="password" name="password" class="form-control" required placeholder="Masukkan password Anda">
                </div>

                <button type="submit" class="btn btn-login w-100">
                    <i class="bi bi-unlock-fill me-2"></i> Masuk
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
