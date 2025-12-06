@extends('layouts.admin')

@section('content')

@php
    $status = $status ?? 0;
@endphp

<div class="content-card">
    <h3>Pengajuan Magang</h3>
    <hr>

    {{-- ========================= --}}
    {{-- TAB FILTER STATUS --}}
    {{-- ========================= --}}
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link {{ $status == 0 ? 'active' : '' }}" 
                href="{{ route('admin.dashboard', ['status' => 0]) }}">
                <i class="bi bi-clock"></i> Pending
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $status == 1 ? 'active' : '' }}" 
                href="{{ route('admin.dashboard', ['status' => 1]) }}">
                <i class="bi bi-check-circle"></i> Diterima
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ $status == 2 ? 'active' : '' }}" 
                href="{{ route('admin.dashboard', ['status' => 2]) }}">
                <i class="bi bi-x-circle"></i> Ditolak
            </a>
        </li>
    </ul>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Universitas</th>
                    <th>Semester</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Surat</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>

            <tbody>
            @forelse($data as $item)
                <tr>
                    <td>{{ $item->pengajuan->nama }}</td>
                    <td>{{ $item->pengajuan->universitas }}</td>
                    <td>{{ $item->pengajuan->semester }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->pengajuan->tanggal_mulai)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($item->pengajuan->tanggal_selesai)) }}</td>

                    {{-- Export File PDF --}}
                    <td>
                        @if($item->pengajuan->surat_pdf)
                            <a href="{{ route('admin.downloadSurat', $item->pengajuan->surat_pdf) }}" 
                               target="_blank"
                               class="btn btn-sm btn-warning" 
                               data-bs-toggle="tooltip" 
                               title="Lihat Surat">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat
                            </a>
                        @else
                            <span class="badge bg-danger">Tidak Ada</span>
                        @endif
                    </td>

                    {{-- AKSI BUTTON --}}
                    <td class="text-center">
                        @if($status == 0)
                            {{-- Tombol Terima --}}
                            <button 
                                class="btn btn-success btn-sm me-2" 
                                onclick="openModal({{ $item->id }}, 1)"
                                data-bs-toggle="tooltip" 
                                title="Terima Pengajuan">
                                <i class="bi bi-check-lg"></i>
                            </button>

                            {{-- Tombol Tolak --}}
                            <button 
                                class="btn btn-danger btn-sm" 
                                onclick="openModal({{ $item->id }}, 2)"
                                data-bs-toggle="tooltip" 
                                title="Tolak Pengajuan">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        @elseif($status == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Diterima
                            </span>
                        @elseif($status == 2)
                            <span class="badge bg-danger">
                                <i class="bi bi-x-circle"></i> Ditolak
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Tidak ada data pengajuan
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>


{{-- ===================================== --}}
{{--           MODAL KETERANGAN           --}}
{{-- ===================================== --}}
<div class="modal fade" id="keteranganModal" tabindex="-1" aria-labelledby="keteranganModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form id="keteranganForm" method="POST" action="">
        @csrf
        <input type="hidden" name="status" id="statusValue">

        <div class="modal-header">
          <h5 class="modal-title" id="keteranganModalLabel">Tambah Keterangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="ket" class="form-label">
                Keterangan <span class="text-danger">*</span>
            </label>
            <textarea name="keterangan" id="ket" class="form-control" rows="4" required
                placeholder="Masukkan keterangan untuk pengajuan ini..."></textarea>
          </div>
          
          <div class="alert alert-info">
              <small>
                  <i class="bi bi-info-circle"></i>
                  Keterangan ini akan dilihat oleh pengguna
              </small>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="bi bi-x-circle"></i> Batal
          </button>
          <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-circle"></i> Simpan
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
    function openModal(id, status) {
        // Set status (1=terima, 2=tolak)
        document.getElementById('statusValue').value = status;
        
        // Set judul modal berdasarkan status
        const modalTitle = document.getElementById('keteranganModalLabel');
        if (status == 1) {
            modalTitle.textContent = 'Terima Pengajuan';
        } else {
            modalTitle.textContent = 'Tolak Pengajuan';
        }

        // Set action URL form
        document.getElementById('keteranganForm').action = "/admin/update-status/" + id;

        // Kosongkan textarea sebelumnya
        document.getElementById('ket').value = '';

        // Buka modal dengan Bootstrap 5
        const keteranganModal = new bootstrap.Modal(document.getElementById('keteranganModal'), {
            backdrop: 'static',
            keyboard: false
        });
        keteranganModal.show();
        
        // Fokus ke textarea
        setTimeout(() => {
            document.getElementById('ket').focus();
        }, 500);
    }
    
    // Inisialisasi tooltip untuk semua elemen yang memiliki data-bs-toggle="tooltip"
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

@endsection