@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">📖 Manajemen Buku</h3>
    <button class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addBookModal">
        ➕ Tambah Buku Baru
    </button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4">Cover</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status Etalase</th>
                        <th class="text-end px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td class="px-4">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover" class="rounded" style="width: 45px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-secondary-subtle rounded d-flex align-items-center justify-content-center text-secondary small fw-bold" style="width: 45px; height: 60px;">No Cover</div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark mb-0">{{ $book->title }}</div>
                            <span class="text-muted small">Oleh: {{ $book->author }}</span>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $book->category->name }}</span></td>
                        <td class="fw-semibold text-dark">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                        <td>
                            <span class="fw-medium {{ $book->stock < 5 ? 'text-danger fw-bold' : 'text-secondary' }}">
                                {{ $book->stock }} eks
                            </span>
                        </td>
                        <td>
                            @if($book->is_active)
                                <span class="badge bg-success-subtle text-success px-2 py-1">Aktif</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger px-2 py-1">Diarsipkan</span>
                            @endif
                        </td>
                        <td class="text-end px-4">
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Hapus data buku ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">Belum ada koleksi buku di sistem.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Buku Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-semibold">Judul Buku</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Penulis</label>
                            <input type="text" name="author" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Penerbit</label>
                            <input type="text" name="publisher" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Tahun Terbit</label>
                            <input type="number" name="publication_year" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Harga Jual (Rupiah)</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Stok Awal</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Deskripsi Singkat</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Cover Buku (.jpg / .png)</label>
                            <input type="file" name="cover" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection