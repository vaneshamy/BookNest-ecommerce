@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">📁 Manajemen Kategori</h3>
    <button class="btn btn-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        ➕ Tambah Kategori
    </button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4" style="width: 10%">No</th>
                        <th style="width: 50%">Nama Kategori</th>
                        <th style="width: 25%">Slug URL</th>
                        <th class="text-end px-4" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                    <tr>
                        <td class="px-4 fw-medium text-secondary">{{ $index + 1 }}</td>
                        <td class="fw-semibold text-dark">{{ $category->name }}</td>
                        <td><span class="badge bg-secondary-subtle text-secondary px-2 py-1">{{ $category->slug }}</span></td>
                        <td class="text-end px-4">
                            <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">✏️</button>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">🗑️</button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" {{-- attributes --}}>
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Ubah Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <div class="modal-body">
                                        <label class="form-label small fw-semibold">Nama Kategori</label>
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-semibold">Nama Kategori</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Novel fiksi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection