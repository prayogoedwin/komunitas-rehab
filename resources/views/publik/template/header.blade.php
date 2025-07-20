<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Gilaprediksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('_frontend/bootstrap4/css/bootstrap.min.css') }} " />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/> --}}
    <link rel="stylesheet" href="{{ asset('_frontend/css/style.css') }}" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/> --}}


    

<body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark"
      style="background-color: #000">
      <div class="container">
       <a class="navbar-brand" href="{{ route('publik') }}">
        <img src="{{ asset('img/logo.png') }}" alt="GilaPrediksi" height="50">
      </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarMain"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <a class="btn btn-outline-light d-lg-none ml-auto" href="{{ route('member.login') }}"
          >Login</a
         > --}}

            @auth('member')
              <a class="btn btn-outline-light d-lg-none ml-aut" href="{{ route('member.dashboard') }}">Akun</a>
              <a class="btn btn-outline-light d-lg-none ml-aut" href="{{ route('member.logout') }}">Logout</a>
            @else
            <a class="btn btn-outline-light d-lg-none ml-aut" href="{{ route('member.login') }}">Login</a>
            @endauth

        <div class="collapse navbar-collapse" id="navbarMain" >
          <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('publik') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('prediksi') }}">Prediksi Sekarang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tonton') }}">Tonton Pertandingan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('peringkat') }}">Pangkat Peringkat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cara') }}">Cara Bermain</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('berita') }}">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('katalog') }}">Tukar Point</a>
            </li>
          </ul>
        </div>
        {{-- <a class="btn btn-outline-light d-none d-lg-block ml-3" href="{{ route('member.login') }}"
          >Login</a
        > --}}

        <!-- Menu tambahan untuk mobile saat login -->
            @auth('member')
             <div class="dropdown d-none d-lg-block">
              <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::guard('member')->user()->name }}
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('member.dashboard') }}">Akun</a>
                <a class="dropdown-item" href="{{ route('member.logout') }}">Logout</a>
              </div>
            </div>
            @else
            <a class="btn btn-outline-light d-none d-lg-block ml-3" href="{{ route('member.login') }}">Login</a>
             @endauth
        
      </div>
    </nav>

    <!-- Sub-navbar -->
    <nav class="navbar navbar-sub" hidden>
      <div class="container">
        <div class="navbar-nav w-100 justify-content-center flex-row flex-wrap">
          <a class="nav-item nav-link" href="index.html">Beranda</a>
          <a class="nav-item nav-link" href="howtoplay.html">Cara Bermain</a>
          <a class="nav-item nav-link" href="catalog.html">Tukar Point</a>
          <a class="nav-item nav-link" href="leaderboard.html"
            >Papan Peringkat</a
          >
          <a class="nav-item nav-link" href="FAQ.html">FAQ</a>
          <a class="nav-item nav-link" href="tonton.html"
            >Tonton Pertandingan</a
          >
          <a
            class="nav-item nav-link text-danger font-weight-bold"
            href="prediksi.html"
            >Live Prediksi Sekarang</a
          >
        </div>
      </div>
    </nav>