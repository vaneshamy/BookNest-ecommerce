@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold text-dark">📊 Ringkasan Dashboard Admin</h3>
    <p class="text-muted">Selamat datang kembali, Administrator. Berikut adalah performa toko buku BookNest hari ini.</p>
</div>

<div class="row g-4 mb-5">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Total Koleksi</h6>
                    <h3 class="fw-bold text-dark mb-0">120</h3>
                </div>
                <div class="fs-1">📖</div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Pesanan Baru</h6>
                    <h3 class="fw-bold text-warning mb-0">5</h3>
                </div>
                <div class="fs-1">📦</div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-1">Pendapatan</h6>
                    <h3 class="fw-bold text-success mb-0">Rp 1.2M</h3>
                </div>
                <div class="fs-1">💰</div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4">
    <h5 class="fw-bold text-dark mb-3">Sistem Siap Operasional</h5>
    <p class="text-secondary mb-0">Silakan gunakan menu di sebelah kiri untuk mengelola kategori buku, menambah pasokan stok buku baru, atau memproses pesanan masuk dari pelanggan.</p>
</div>
@endsection