<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
            <img src="{{ asset('img/gym.png') }}" alt="Logo Komunitas Rehab" class="logo" width="40"> Komunitas Rehab
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('index') ? 'active' : '' }}" href="{{ route('index') }}">Beranda</a>
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
                @if (Auth::guard('member')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                            <li>
                                <a class="dropdown-item {{ Route::is('member/profil') ? 'active' : '' }}"
                                    href="{{ route('member.profil') }}">
                                    Profil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ Route::is('password.update') ? 'active' : '' }}"
                                    href="">
                                    Update Password
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('member.logout') }}" class="d-inline">
                                    {{-- @csrf --}}
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('member/login') ? 'active' : '' }}"
                            href="{{ route('member.login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
