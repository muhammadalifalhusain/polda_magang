@extends('layouts.app')

@section('title', 'Saran & Masukan')

@section('content')

{{-- =========================== --}}
{{-- POPUP ALERT DI BAGIAN ATAS --}}
{{-- =========================== --}}
@if(session('success'))
<div class="alert alert-success text-center fw-bold" 
     style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999; border-radius: 0;">
    🎉 {{ session('success') }}
</div>

<script>
    setTimeout(() => {
        document.querySelector('.alert-success').style.display = 'none';
    }, 3500);
</script>
@endif

@if(session('error'))
<div class="alert alert-danger text-center fw-bold" 
     style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999; border-radius: 0;">
    ⚠️ {{ session('error') }}
</div>

<script>
    setTimeout(() => {
        document.querySelector('.alert-danger').style.display = 'none';
    }, 3500);
</script>
@endif


<div class="head">
    <div class="head-h4">
        <h4>Saran & Masukan</h4>
    </div>
    <div class="head-link">
        <a href="{{ url('/') }}">Beranda</a>
        <i class="bi bi-arrow-right mx-1"></i>
        <span>Saran & Masukan</span>
    </div>
</div>

<section class="py-4">
    <div class="container">

        <h2 class="fw-bold text-center mb-3" style="color:#d35400;">Form Saran & Masukan</h2>
        <p class="text-center text-muted mb-4">
            Kirimkan pendapat, kritik, atau saran demi meningkatkan kualitas pelayanan & kegiatan magang.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <form method="POST" action="{{ route('kegiatan.saran.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea name="pesan" rows="4" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send"></i> Kirim Saran
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
