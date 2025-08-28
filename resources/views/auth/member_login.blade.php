@extends('publik.app')

@section('content')
    <!-- Login Card -->
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>

            <!-- Social Login Button -->
            <a href="{{ route('member.social.login', 'google') }}" class="btn btn-google">
                <i class="fab fa-google"></i>Login dengan Google
            </a>

            <div class="divider">
                <span>atau masuk manual</span>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('member.login.submit') }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email Anda" name="email" required />
                </div>

                <div class="mb-3 password-toggle">
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password" id="password"
                        required />
                    <span class="password-toggle-icon" id="togglePassword">
                        <i class="far fa-eye"></i>
                    </span>
                </div>

                <input type="hidden" name="recaptcha_token" id="recaptcha_token" />

                <button type="submit" class="btn btn-login">Masuk</button>
            </form>

            <div class="login-links">
                <p class="mb-2">Belum punya akun? <a href="{{ route('member.register') }}">Daftar Sekarang</a></p>
                <p class="mb-0">Lupa password? <a href="{{ route('member.password.request') }}">Reset Password</a></p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- path path js --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6LdYxo0rAAAAABFf45sqd6cD1p9E9S6BpUG2ItM5"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdYxo0rAAAAABFf45sqd6cD1p9E9S6BpUG2ItM5', {
                action: 'login'
            }).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>
@endpush
