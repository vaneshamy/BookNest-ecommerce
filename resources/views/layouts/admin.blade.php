<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - BookNest</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .sidebar { min-height: 100vh; background-color: #1e293b; color: #fff; }
        .sidebar .nav-link { color: #94a3b8; font-weight: 500; padding: 0.8rem 1rem; border-radius: 0.375rem; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: #334155; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column p-3">
            <h5 class="text-center fw-bold py-3 text-white border-bottom border-secondary">📚 BookNest Admin</h5>
            <ul class="nav nav-pills flex-column mb-auto mt-3 gap-1">
                <li class="nav-item">
                    <a href="#" class="nav-link">📊 Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">📁 Kelola Kategori</a>
                </li>
                <li>
                    <a href="{{ route('admin.books.index') }}" class="nav-link {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">📖 Kelola Buku</a>
                </li>
                <li>
                    <a href="#" class="nav-link">📦 Pesanan Masuk</a>
                </li>
            </ul>
            <hr class="border-secondary">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-full d-block text-start w-100">🚪 Kelola Keluar</button>
            </form>
        </div>

        <div class="col-md-9 col-lg-10 ms-sm-auto p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                    ✨ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>