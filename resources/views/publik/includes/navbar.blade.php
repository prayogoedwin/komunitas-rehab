<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-heartbeat me-2"></i>Komunitas Rehab
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('index') ? 'active' : '' }}"
                        href="i{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang
                        Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('forum') ? 'active' : '' }}" href="{{ route('forum') }}">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('edukasi') ? 'active' : '' }}"
                        href="{{ route('edukasi') }}">Edukasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('proyek') ? 'active' : '' }}"
                        href="{{ route('proyek') }}">Proyek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('dukungan') ? 'active' : '' }}"
                        href="{{ route('dukungan') }}">Dukungan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('gabung') ? 'active' : '' }}"
                        href="{{ route('gabung') }}">Bergabung</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
