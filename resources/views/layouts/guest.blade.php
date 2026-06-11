<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BookNest') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc !important; /* Warna latar belakang abu-abu sangat lembut (soft slate) */
        }
        
        /* Mengubah gaya kotak Card utama */
        .card {
            border: 1px solid #e2e8f0 !important;
            border-radius: 1rem !important; /* Sudut kotak lebih membulat halus/modern */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03) !important;
        }

        /* Mengubah semua inputan agar tidak kaku */
        .form-control {
            padding: 0.6rem 1rem !important; /* Kotak input lebih tebal dan lega */
            border-radius: 0.5rem !important;
            border: 1px solid #cbd5e1 !important;
            font-size: 0.95rem !important;
            transition: all 0.2s ease;
        }

        /* Efek saat kolom input diklik (fokus) */
        .form-control:focus {
            border-color: #4f46e5 !important; /* Berubah jadi warna indigo elegan, bukan biru pekat standar */
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1) !important;
        }

        /* Mengubah Tombol Utama (Button) */
        .btn-primary {
            background-color: #4f46e5 !important; /* Warna Indigo Premium */
            border-color: #4f46e5 !important;
            padding: 0.6rem 1rem !important;
            border-radius: 0.5rem !important;
            font-weight: 600 !important;
            transition: all 0.2s ease;
        }

        /* Efek saat tombol disentuh kursor */
        .btn-primary:hover {
            background-color: #4338ca !important; /* Indigo sedikit lebih gelap saat hover */
            border-color: #4338ca !important;
        }
    </style>
</head>
<body class="bg-light">

    <div class="min-vh-screen d-flex flex-column justify-content-center align-items-center py-5">
        
        <div class="mb-4 text-center">
            <a href="/" class="fs-3 fw-bold text-dark text-decoration-none d-flex align-items-center justify-content-center gap-2">
                <span class="fs-2">📚</span> BookNest
            </a>
        </div>

        <div class="container">
            {{ $slot }}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>