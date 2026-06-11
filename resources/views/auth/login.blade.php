<x-guest-layout>
    <div class="card shadow-sm border-0 rounded-3 text-start mx-auto" style="max-width: 420px;">
        <div class="card-body p-4">
            <h4 class="card-title text-center mb-4 fw-bold text-dark">Masuk ke BookNest</h4>

            @if (session('status'))
                <div class="alert alert-success small mb-3" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold text-secondary">Alamat Email</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label for="password" class="form-label small fw-semibold text-secondary mb-0">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           required 
                           autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label small text-muted" for="remember_me">
                        Ingat saya di perangkat ini
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary fw-semibold py-2">
                        Masuk
                    </button>
                </div>

                <div class="text-center mt-3">
                    <a class="text-decoration-none small text-muted" href="{{ route('register') }}">
                        Belum punya akun? <span class="text-primary fw-medium">Daftar di sini</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>